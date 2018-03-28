<?php

namespace App\Action\Interfaces\Trick;

use Symfony\Component\HttpFoundation\Request;

/**
 * Interface DetailsTricksActionInterface.
 */
interface DetailsTricksActionInterface
{
    /**
     * @param string  $id
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(String $id, Request $request);
}
