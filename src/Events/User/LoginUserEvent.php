<?php

namespace App\Events\User;


use App\Entity\User;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class LoginUserEvent
 * @package App\Events\User
 */
class LoginUserEvent extends Event
{
    const NAME = 'login.user';

    /**
     * @var User
     */
    private $user;

    /**
     * LoginUserEvent constructor.
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
