<?php

namespace App\Events\User;

use App\Entity\Interfaces\UserInterface;
use App\Events\User\Interfaces\UserEventInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * Class ForgotPasswordUserEvent.
 */
class ForgotPasswordUserEvent extends Event implements UserEventInterface
{
    const NAME = 'forgot_password.user';

    /**
     * @var UserInterface
     */
    private $user;

    /**
     * ResetPasswordUserEvent constructor.
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
