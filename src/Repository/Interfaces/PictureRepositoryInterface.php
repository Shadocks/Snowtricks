<?php

namespace App\Repository\Interfaces;

/**
 * Interface PictureRepositoryInterface.
 */
interface PictureRepositoryInterface
{
    /**
     * @param string $id
     *
     * @return mixed
     */
    public function findOnePictureBy(String $id);
}
