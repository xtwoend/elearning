<?php 

namespace Xtwoend\Component\Discuss\Presenter;

 /**
 * FileName
 *
 * 
 *     
 * @version    0.1
 * @author     Abdul Hafidz Anshari
 * @license    BSD License (3-clause) 
 */

use Purifier;
use Carbon\Carbon;
use HTML_To_Markdown;
use Misd\Linkify\Linkify;
use Michelf\MarkdownExtra;
use McCool\LaravelAutoPresenter\BasePresenter;
use Xtwoend\Component\Discuss\Entities\ForumThread;
use Str;

class ThreadPresenter extends BasePresenter
{   
    protected $markdownParser;

    public $wrappedObject;

	public function __construct(ForumThread $resource)
    {
        $this->wrappedObject = $resource;
    }

    public function url()
    {   
        if ( ! $this->wrappedObject->slug) {
            return '';
        }
        return action('Forum\ForumThreadsController@show', [$this->wrappedObject->slug]);
    }

    public function subject()
    {
        $subject = str_limit($this->wrappedObject->subject, 80);

        return $subject;
    }

	public function created_ago()
    {
        return $this->wrappedObject->created_at->diffForHumans();
    }

    public function updated_ago()
    {
        return $this->wrappedObject->updated_at->diffForHumans();
    }

    /**
     * [body description]
     * @return [type] [description]
     */
    public function body()
    {  
        $body = $this->wrappedObject->body;
        $body = $this->convertMarkdown($body);
        $body = $this->linkify($body);
        return $body;
    }

    /**
     * [markAsSolutionUrl description]
     * @param  [type] $replyId [description]
     * @return [type]          [description]
     */
    public function markAsSolutionUrl($replyId)
    {
        return action('Forum\ForumThreadsController@getMarkQuestionSolved', [$this->wrappedObject->id, $replyId]);
    }

    /**
     * [markAsUnsolvedUrl description]
     * @return [type] [description]
     */
    public function markAsUnsolvedUrl()
    {
        return action('Forum\ForumThreadsController@getMarkQuestionUnsolved', [$this->wrappedObject->id]);
    }

    /**
     * [editUrl description]
     * @return [type] [description]
     */
    public function editUrl()
    {
        return action('Forum\ForumThreadsController@edit', [$this->id]);
    }

    /**
     * [deleteUrl description]
     * @return [type] [description]
     */
    public function deleteUrl()
    {
        return action('Forum\ForumThreadsController@destroy', [$this->id]);
    }

    //-------------
    private function linkify($content)
    {
        $linkify = new Linkify();
        return $linkify->process($content);
    }

    private function convertMarkdown($content)
    {   
        $this->markdownParser = new MarkdownExtra;
        $this->markdownParser->no_markup = true;
        $html = $this->markdownParser->transform($content);
        return Purifier::clean($html, 'markdown');
    }
}