<?php

namespace App\Subscriber\Form\User\Interfaces;

use App\Events\User\RegistrationUserEvent;
use App\Events\User\ForgotPasswordUserEvent;

/**
 * Interface UserSecuritySubscriberInterface.
 */
interface UserSecuritySubscriberInterface
{
    /**
     * @param RegistrationUserEvent $userEvent
     */
    public function onRegistration(RegistrationUserEvent $userEvent);

    /**
     * @param ForgotPasswordUserEvent $userEvent
     */
    public function onForgotPassword(ForgotPasswordUserEvent $userEvent);
}
