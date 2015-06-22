<?php

namespace Xtwoend\Component\Discuss\Jobs;

/**
 * event listener
 */
interface ForumThreadCreatorListener
{
    public function threadCreationError($errors);
    public function threadCreated($thread);
}