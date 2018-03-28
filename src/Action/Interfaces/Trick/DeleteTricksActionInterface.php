<?php

namespace App\Action\Interfaces\Trick;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Interface DeleteTricksActionInterface.
 */
interface DeleteTricksActionInterface
{
    /**
     * @param string           $id
     * @param SessionInterface $session
     *
     * @return mixed
     */
    public function __invoke(String $id, SessionInterface $session);
}
