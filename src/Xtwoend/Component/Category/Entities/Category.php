<?php 

namespace Xtwoend\Component\Category\Entities;

 /**
 * FileName
 *
 * 
 *     
 * @version    0.1
 * @author     Abdul Hafidz Anshari
 * @license    BSD License (3-clause) 
 */

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

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
    protected $fillable = ['name', 'slug', 'description'];
}