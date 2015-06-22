<?php

namespace Xtwoend\Component\Discuss\Jobs;

/**
 * event listener
 */
interface ForumThreadUpdaterListener
{
    public function threadUpdateError($errors);
    public function threadUpdated($thread);
    public function threadUpdatedJson($thread);
}