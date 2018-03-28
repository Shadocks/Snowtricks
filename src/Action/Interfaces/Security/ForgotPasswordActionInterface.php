<?php

namespace App\Action\Interfaces\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Interface ForgotPasswordActionInterface.
 */
interface ForgotPasswordActionInterface
{
    /**
     * @param Request          $request
     * @param SessionInterface $session
     *
     * @return mixed
     */
    public function __invoke(Request $request, SessionInterface $session);
}
