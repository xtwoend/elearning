<?php

namespace Xtwoend\Component\Discuss\Jobs;

use Xtwoend\Component\Core\Jobs\Job;
use Xtwoend\Component\Discuss\Repositories\ForumThreadRepository;

class ForumThreadUpdater extends Job
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

    public function update(ForumThreadUpdaterListener $observer, $thread, $data)
    {   
        return $this->updateRecord($thread, $observer, $data);
    }

    private function updateRecord($thread, $observer, $data)
    {
        $thread->fill($data);

        // check the model validation
        if ( ! $this->threads->save($thread)) {
            return $observer->threadUpdateError($thread->getErrors());
        }
        //retag if change it
        if(isset($data['tags']))
        {
            $thread->retag($data['tags']); 
        }

        return $observer->threadUpdated($thread);
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }
}   