<?php

namespace App\Repository\Interfaces;

/**
 * Interface VideoRepositoryInterface.
 */
interface VideoRepositoryInterface
{
    /**
     * @param $id
     *
     * @return mixed
     */
    public function findOneVideoBy($id);
}
