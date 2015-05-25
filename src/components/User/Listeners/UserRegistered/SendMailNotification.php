<?php namespace Elearning\User\Listeners\UserRegistered;

use Elearning\User\Events\UserRegisteredEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Elearning\User\Mailers\AppMailer;

class SendMailNotification
{   
    /**
     * Elearning\User\Mailers\AppMailer $mailer
     */
    protected $mailer;

    /**
     * Create the event listener.
     * @param Elearning\User\Mailers\AppMailer $mailer
     */
    public function __construct(AppMailer $mailer)
    {
        $this->mailer = $mailer;
    }
    /**
     * Handle the event.
     *
     * @param  UserRegisteredEvent $event
     *
     * @return void
     */
    public function handle(UserRegisteredEvent $event)
    {
        $user = $event->user;
        $this->mailer->sendEmailConfirmationTo($user);
    }
}