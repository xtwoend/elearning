<?php namespace Elearning\User\Events;

use Elearning\Core\Events\Event;
use Elearning\User\Entities\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserRegisteredEvent extends Event implements ShouldBroadcast
{
//    use SerializesModels;
    public $user;
    /**
     * Create a new event instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['notification'];
    }
}