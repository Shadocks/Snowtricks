<?php

namespace App\Action\Interfaces\Security;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Interface ValidationAccountActionInterface.
 */
interface ValidationAccountActionInterface
{
    /**
     * @param string           $token
     * @param SessionInterface $session
     *
     * @return mixed
     */
    public function __invoke(String $token, SessionInterface $session);
}
