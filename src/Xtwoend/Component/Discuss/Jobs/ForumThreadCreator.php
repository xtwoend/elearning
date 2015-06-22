<?php

namespace Xtwoend\Component\Discuss\Jobs;

use Xtwoend\Component\Core\Jobs\Job;
use Xtwoend\Component\Discuss\Repositories\ForumThreadRepository;

class ForumThreadCreator extends Job
{   
    /**
     * [$threads description]
     * @var [type]
     */
    protected $threads;

    /**
     * [$tags description]
     * @var [type]
     */
    protected $tags;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ForumThreadRepository $threads)
    {
        $this->threads = $threads;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function create(ForumThreadCreatorListener $listener, $data)
    {
        $thread = $this->getNew($data);
        
        $this->setTags($data['tags']);

        return $this->save($listener, $thread);
    }

    private function getNew($data)
    {
        return $this->threads->getNew($data + [
            'author_id' => $data['author']->id
        ]);
    } 

    private function save($listener, $thread)
    {
        if (! $this->threads->save($thread)) {
            return $listener->threadCreationError($thread->getErrors());
        }

        $thread->retag($this->tags); 

        return $listener->threadCreated($thread);
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }
}   