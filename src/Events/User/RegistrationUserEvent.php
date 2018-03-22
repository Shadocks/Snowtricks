<?php

namespace App\Events\User;

use App\Entity\Interfaces\UserInterface;
use App\Events\User\Interfaces\UserEventInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class RegistrationUserEvent.
 */
class RegistrationUserEvent extends Event implements UserEventInterface
{
    const NAME = 'registration.user';

    /**
     * @var UserInterface
     */
    private $user;

    /**
     * RegistrationUserEvent constructor.
     *
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface
    {
        return $this->user;
    }
}
