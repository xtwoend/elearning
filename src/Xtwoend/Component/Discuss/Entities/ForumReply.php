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
    	return $this->belongsTo(ForumReply::class, 'thread_id');
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