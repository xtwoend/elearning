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
use Xtwoend\Component\Discuss\Entities\ForumReply;
use Str;

class ReplyPresenter extends BasePresenter
{   
    /**
     * [$markdownParser description]
     * @var [type]
     */
    protected $markdownParser;
    
    public $resource;
    /**
     * [__construct description]
     * @param ForumReply $resource [description]
     */
	public function __construct(ForumReply $resource)
    {
        $this->wrappedObject = $resource;
        $this->resource = $resource;
    }

    public function url()
    {   $queryString = new ReplyQueryStringGenerator;
        $slug = $this->wrappedObject->thread->slug;
        $threadUrl = action('Forum\ForumThreadsController@show', [$slug]);
        return $threadUrl . $queryString->generate($this->wrappedObject);
    }

	public function created_ago()
    {
        return $this->wrappedObject->created_at->diffForHumans();
    }

    public function updated_ago()
    {
        return $this->wrappedObject->updated_at->diffForHumans();
    }

    public function body()
    {
        $body = $this->wrappedObject->body;
        $body = $this->convertMarkdown($body);
        $body = $this->linkify($body);
        return $body;
    }

    /**
     * [editUrl description]
     * @return [type] [description]
     */
    public function editUrl()
    {
        return action('Forum\ForumRepliesController@edit', [$this->id]);
    }

    /**
     * [deleteUrl description]
     * @return [type] [description]
     */
    public function deleteUrl()
    {
        return action('Forum\ForumRepliesController@destroy', [$this->id]);
    }

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