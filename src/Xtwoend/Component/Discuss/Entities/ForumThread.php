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
     * [acceptedSolution description]
     * @return [type] [description]
     */
    public function acceptedSolution()
    {
        return $this->belongsTo(ForumReply::class, 'solution_reply_id');
    }

    /**
     * [mostRecentReply description]
     * @return [type] [description]
     */
    public function mostRecentReply()
    {
        return $this->belongsTo(ForumReply::class, 'most_recent_reply_id');
    }

    /**
     * [isQuestion description]
     * @return boolean [description]
     */
    public function isQuestion()
    {
        return $this->is_question;
    }

    /**
     * [isSolved description]
     * @return boolean [description]
     */
    public function isSolved()
    {
        return $this->isQuestion() && ! is_null($this->solution_reply_id);
    }

    /**
     * [replyTheSolution description]
     * @return [type] [description]
     */
    public function replyTheSolution()
    {
        if($this->isSolved())
        {
            return $this->replies()->find($this->solution_reply_id);
        }

        return ;
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
     * [isReplyTheSolution description]
     * @param  [type]  $reply [description]
     * @return boolean        [description]
     */
    public function isReplyTheSolution($reply)
    {
        return $reply->id == $this->solution_reply_id;
    }

    /**
     * set most recent reply
     * @param Reply $reply [description]
     */
    public function setMostRecentReply(ForumReply $reply)
    {
        $this->most_recent_reply_id = $reply->id;
        $this->updateReplyCount();
        $this->save();
    }

    /**
     * update counter reply
     * @return [type] [description]
     */
    public function updateReplyCount()
    {
        if ($this->exists) {
            $this->reply_count = $this->replies()->count();
            $this->save();
        }
    }

    /**
     * Slug Mutator
     * @param [type] $subject [description]
     */
    public function setSubjectAttribute($subject)
    {
        $this->attributes['subject'] = $subject;
        $this->attributes['slug'] = $this->generateNewSlug();
    }

    /**
     * [generateNewSlug description]
     * @return [type] [description]
     */
    private function generateNewSlug()
    {
        $i = 0;
        do {
            $slug = $this->generateSlugByIncrementer($i++);
        } while ($this->getCountBySlug($slug) > 0);

        return $slug;
    }

    /**
     * [getCountBySlug description]
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    private function getCountBySlug($slug)
    {
        $query = static::where('slug', '=', $slug);

        if ($this->exists) {
            $query->where('id', '!=', $this->id);
        }

        return $query->count();
    }

    /**
     * [generateSlugByIncrementer description]
     * @param  [type] $i [description]
     * @return [type]    [description]
     */
    private function generateSlugByIncrementer($i)
    {
        if ($i == 0) $i = '';
        /*
        if ($this->created_at) {
            $date = date('m-d-Y', strtotime($this->created_at));
        } else {
            $date = date('m-d-Y');
        }
        
        return str_slug("{$date} - {$this->subject}" . $i);
        */
        return str_slug("{$this->subject}-" . $i);
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