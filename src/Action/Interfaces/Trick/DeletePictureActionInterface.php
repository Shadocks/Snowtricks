<?php

namespace App\Action\Interfaces\Trick;

/**
 * Interface DeletePictureActionInterface.
 */
interface DeletePictureActionInterface
{
    /**
     * @param string $id_picture
     */
    public function __invoke(String $id_picture);
}
