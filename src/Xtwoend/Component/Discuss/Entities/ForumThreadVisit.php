<?php 

namespace Xtwoend\Component\Discuss\Entities;

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

class ForumThreadVisit extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'forum_thread_visitations';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['visited_at'];

	/**
     * Fillable property.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'thread_id', 'visited_at', 'ip'];

    /**
     * Relation To ForumThread
     * @return Collection
     */
    public function thread()
    {
        return $this->belongsTo(ForumThread::class);
    }

    /**
     * Relation to user
     * @return Collection
     */
    public function user()
    {
        return $this->belongsTo(config('auth.model'), 'user_id');
    }
}