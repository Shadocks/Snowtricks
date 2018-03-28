<?php

namespace App\Action\Interfaces\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Interface ResetPasswordActionInterface.
 */
interface ResetPasswordActionInterface
{
    /**
     * @param Request          $request
     * @param string           $token
     * @param SessionInterface $session
     *
     * @return mixed
     */
    public function __invoke(Request $request, String $token, SessionInterface $session);
}
