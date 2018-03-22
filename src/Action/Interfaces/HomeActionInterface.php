<?php

namespace App\Action\Interfaces;

use Symfony\Component\HttpFoundation\Request;

/**
 * Interface HomeActionInterface.
 */
interface HomeActionInterface
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request);
}
