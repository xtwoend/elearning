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

class Tagged extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tagged';

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
    protected $fillable = ['tag_name', 'tag_slug'];
    
    /**
     * [taggable description]
     * @return [type] [description]
     */
    public function taggable() {
        return $this->morphTo();
    }
}