<?php

namespace App\Action\Interfaces\User;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Interface RegistrationActionInterface.
 */
interface RegistrationActionInterface
{
    /**
     * @param Request          $request
     * @param SessionInterface $session
     *
     * @return mixed
     */
    public function __invoke(Request $request, SessionInterface $session);
}
