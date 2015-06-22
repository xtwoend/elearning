<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Xtwoend\Component\Category\Repositories\TagRepository;
use Xtwoend\Component\Discuss\Repositories\ForumThreadRepository;
use Xtwoend\Component\Discuss\Repositories\ForumReplyRepository;

class ForumRepliesController extends Controller 
{
    /**
     * [$tags description]
     * @var [type]
     */
    protected $tags;

    /**
     * [$threads description]
     * @var [type]
     */
    protected $threads;

    /**
     * [$replies description]
     * @var [type]
     */
    protected $replies;

    /**
     * [__construct description]
     * @param TagRepository         $tags    [description]
     * @param ForumThreadRepository $threads [description]
     */
    public function __construct(
        TagRepository $tags, 
        ForumThreadRepository $threads, 
        ForumReplyRepository $replies
    )
    {
        $this->tags = $tags;
        $this->threads = $threads;
        $this->replies = $replies;
    }

    public function getReply(Request $request)
    {   $reply = $this->replies->find($request->get('id'));
        return $reply->body;
    }
}
