<?php

namespace App\Action\Interfaces\Trick;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Interface AddTricksActionInterface.
 */
interface AddTricksActionInterface
{
    /**
     * @param Request          $request
     * @param SessionInterface $session
     *
     * @return mixed
     */
    public function __invoke(Request $request, SessionInterface $session);
}
