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
 
class Hashtag extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hashtags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['hashtag'];

    /**
     * Relation to User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function posts()
    {
    	return $this->belongsToMany(__NAMESPACE__.'\\Post', 'post_hashtag', 'post_id', 'hashtag_id');
    }

}