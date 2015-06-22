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
use McCool\LaravelAutoPresenter\HasPresenter;
use Xtwoend\Component\Discuss\Presenter\ReplyPresenter;

class ForumReply extends Model implements HasPresenter
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'forum_replies';

	/**
     * Fillable property.
     *
     * @var array
     */
    protected $fillable = ['body', 'author_id', 'thread_id', 'ip'];

    /**
     * [thread description]
     * @return [type] [description]
     */
    public function thread()
    {
    	return $this->belongsTo(ForumThread::class, 'thread_id');
    }

    /**
     * [author description]
     * @return [type] [description]
     */
    public function author()
    {
        return $this->belongsTo(config('auth.model'), 'author_id');
    }  

    /**
     * [getPrecedingReplyCount description]
     * @return [type] [description]
     */
    public function getPrecedingReplyCount()
    {
        return $this->newQuery()->where('thread_id', $this->thread_id)->where('created_at', '<', $this->created_at)->count();
    }

    /**
     * [isManageableBy description]
     * @param  [type]  $user [description]
     * @return boolean       [description]
     */
    public function isManageableBy($user)
    {
        if ( ! $user) return false;
        return $this->isOwnedBy($user) || $user->isForumAdmin();
    }

    /**
     * [isOwnedBy description]
     * @param  [type]  $user [description]
     * @return boolean       [description]
     */
    public function isOwnedBy($user)
    {
        if ( ! $user) return false;
        return $user->id == $this->author_id;
    }
    
    /**
     * Presenter Reply
     * @return ReplyPresenter
     */
    public function getPresenterClass()
    {
        return ReplyPresenter::class;
    }
}