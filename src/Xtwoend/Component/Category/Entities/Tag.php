<?php 

namespace Xtwoend\Component\Category\Entities;

 /**
 * Forum Reply Model
 *
 * 
 *     
 * @version    0.1
 * @author     Abdul Hafidz Anshari
 * @license    BSD License (3-clause) 
 */

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * [$timestamps description]
     * @var boolean
     */
    public $timestamps = false;

	/**
     * Fillable property.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * [__construct description]
     * @param array $attributes [description]
     */
    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);
        
        if($connection = config('category.connection')) {
            $this->connection = $connection;
        }
    }
    
    /**
     * [save description]
     * @param  array  $options [description]
     * @return [type]          [description]
     */
    public function save(array $options = array()) {
        $validator = \Validator::make(
            array('name' => $this->name),
            array('name' => 'required|min:1')
        );
        
        if($validator->passes()) {
            $normalizer = config('category.normalizer');
            $normalizer = empty($normalizer) ? '\Xtwoend\Component\Category\TaggingUtil::slug' : $normalizer;
            
            $this->slug = call_user_func($normalizer, $this->name);
            parent::save($options);
        } else {
            throw new \Exception('Tag Name is required');
        }
    }
    
    /**
     * Get suggested tags
     */
    public function scopeSuggested($query) {
        return $query->where('suggest', true);
    }
    
    /**
     * Name auto-mutator
     */
    public function setNameAttribute($value) {
        $displayer = config('category.displayer');
        $displayer = empty($displayer) ? '\Illuminate\Support\Str::title' : $displayer;
        
        $this->attributes['name'] = call_user_func($displayer, $value);
    }
}