<?php

namespace App\Events\User\Interfaces;

use App\Entity\Interfaces\UserInterface;

/**
 * Interface UserEventInterface.
 */
interface UserEventInterface
{
    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface;
}
