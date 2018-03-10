<?php

namespace App\Events\User;


use App\Entity\User;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class RegistrationUserEvent
 * @package App\Events\User
 */
class RegistrationUserEvent extends Event
{
    const NAME = 'registration.user';

    /**
     * @var User
     */
    private $user;

    /**
     * RegistrationUserEvent constructor.
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
