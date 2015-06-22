<?php

namespace Xtwoend\Component\Magazine\Entities;

/**
 * Post Model
 *
 * 
 *     
 * @version    0.1
 * @author     Abdul Hafidz Anshari
 * @license    BSD License (3-clause) 
 */

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

	/**
     * Fillable property.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'body', 'author_id', 'img_cover'];

    
}
