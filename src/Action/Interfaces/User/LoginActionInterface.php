<?php

namespace App\Action\Interfaces\User;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Interface LoginActionInterface.
 */
interface LoginActionInterface
{
    /**
     * @param AuthenticationUtils $authenticationUtils
     *
     * @return mixed
     */
    public function __invoke(AuthenticationUtils $authenticationUtils);
}
