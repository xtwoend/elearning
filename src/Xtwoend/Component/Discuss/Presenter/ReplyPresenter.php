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
    protected $markdownParser;

	public function __construct(ForumReply $resource)
    {
        $this->wrappedObject = $resource;
    }

    public function url()
    {
        if ( ! $this->wrappedObject->slug) {
            return '';
        }
        return action('DiscussController@show', [$this->wrappedObject->slug]);
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