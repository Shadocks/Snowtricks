<?php

namespace App\Repository\Interfaces;

/**
 * Interface TrickRepositoryInterface.
 */
interface TrickRepositoryInterface
{
    /**
     * @return mixed
     */
    public function findAllTrick();

    /**
     * @param $id
     *
     * @return mixed
     */
    public function findOneTrickBy($id);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function findOneByIdJoinToCommentsPicturesVideos($id);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function findOneByIdJoinToPicturesVideos($id);
}
