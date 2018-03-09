<?php

namespace App\Events\User;


use App\Entity\User;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class ResetPasswordUserEvent
 * @package App\Events\User
 */
class ResetPasswordUserEvent extends Event
{
    const NAME = 'reset_password.user';

    /**
     * @var User
     */
    private $user;

    /**
     * ResetPasswordUserEvent constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
