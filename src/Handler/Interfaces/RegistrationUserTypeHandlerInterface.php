<?php

namespace App\Handler\Interfaces;

use App\Entity\Interfaces\UserInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Interface RegistrationUserTypeHandlerInterface.
 */
interface RegistrationUserTypeHandlerInterface
{
    /**
     * @param FormInterface $form
     * @param UserInterface $user
     *
     * @return mixed
     */
    public function handleRegistration(FormInterface $form, UserInterface $user);
}
