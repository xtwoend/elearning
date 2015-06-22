<?php

namespace Xtwoend\Component\Discuss\Jobs;

use Xtwoend\Component\Core\Jobs\Job;
use Xtwoend\Component\Discuss\Repositories\ForumReplyRepository;
use Xtwoend\Component\Discuss\Repositories\ForumThreadRepository;

class ForumReplyCreator extends Job
{   
    /**
     * [$replies description]
     * @var [type]
     */
    protected $replies;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ForumReplyRepository $replies)
    {
        $this->replies = $replies;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function create(ForumReplyCreatorListener $listener, $data, $threadId)
    {
        $reply = $this->getNew($data, $threadId);
        return $this->save($listener, $reply);
    }

    private function getNew($data, $threadId)
    {
        return $this->replies->getNew($data + [
            'thread_id' => $threadId,
            'author_id' => $data['author']->id,
        ]);
    } 

    private function save($listener, $reply)
    {
        if (! $this->replies->save($reply)) {
            return $listener->replyCreationError($reply->getErrors());
        }

        $this->updateThreadCounts($reply->thread);
        $this->setThreadMostRecentReply($reply);

        return $listener->replyCreated($reply);
    }

    private function updateThreadCounts($thread)
    {
        $thread->updateReplyCount();
    }

    private function setThreadMostRecentReply($reply)
    {
        $reply->thread->setMostRecentReply($reply);
    }

}   