<?php

namespace Xtwoend\Component\Discuss\Jobs;

/**
 * event listener
 */
interface ForumReplyCreatorListener
{
    public function replyCreationError($errors);
    public function replyCreated($reply);
}