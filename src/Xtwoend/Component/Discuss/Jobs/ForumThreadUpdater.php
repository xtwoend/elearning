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

       
        return $observer->threadUpdated($thread);
    }

    public function updateRaw(ForumThreadUpdaterListener $observer, $thread, $data)
    {
        $thread->fill($data);

        // check the model validation
        if ( ! $this->threads->save($thread)) {
            return ['message' => 'error update'];
        }
       
        return $observer->threadUpdatedJson($thread);
    }

}   