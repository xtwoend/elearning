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
use Xtwoend\Component\Discuss\Presenter\ThreadPresenter;

class ForumThread extends Model implements HasPresenter
{

    /**
     * Tagging Thread
     */
    use \Xtwoend\Component\Category\Traits\Taggable;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'forum_threads';

	/**
     * Fillable property.
     *
     * @var array
     */
    protected $fillable = ['author_id', 'subject', 'body', 'slug', 'category_slug', 'most_recent_reply_id', 'reply_count', 'is_question', 'ip', 'pinned', 'solution_reply_id'];

    /**
     * Relation relplies thread
     * 
     * @return Collection
     */
    public function replies()
    {
        return $this->hasMany(ForumReply::class, 'thread_id');
    }

    /**
     * Relation has Many to visitation 
     * 
     * @return Collection
     */
    public function visitations()
    {
        return $this->hasMany(ForumThreadVisit::class, 'thread_id');
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
     * [solutionthread description]
     * @return [type] [description]
     */
    public function solutionthread()
    {
        return $this->hasOne(get_class(), 'solution_reply_id');
    }

    /**
     * [is_question description]
     * @return boolean [description]
     */
    public function is_question()
    {
        return $this->attributes['is_question'];
    }

    /**
     * Presenter Thread
     * @return ThreadPresenter
     */
    public function getPresenterClass()
    {
        return ThreadPresenter::class;
    }
}