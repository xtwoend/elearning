<?php  namespace Elearning\Sosmed\Entities;

/**
 * Part of the package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    
 * @version    0.1
 * @author     Abdul Hafidz Anshari
 * @license    BSD License (3-clause)
 * @copyright  (c) 2014 
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['post_body', 'post_type','user_id'];

    /**
     * Relation to User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
    	return $this->belongsTo('Elearning\User\Entities\User');
    }

    /**
     * Relation to Media.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function medias()
    {
        return $this->hasMany(__NAMESPACE__.'\\PostMedia', 'post_id');
    }

    /**
     * Relation to Comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function comments()
    {
        return $this->hasMany(__NAMESPACE__.'\\PostComment', 'post_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($post)
        {
            $post->user_id = Auth::user()->id;
        });
    }
}