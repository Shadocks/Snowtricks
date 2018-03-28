<?php

namespace App\Action\Interfaces\User;

use Symfony\Component\HttpFoundation\Request;

/**
 * Interface RegistrationActionInterface.
 */
interface RegistrationActionInterface
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request);
}
