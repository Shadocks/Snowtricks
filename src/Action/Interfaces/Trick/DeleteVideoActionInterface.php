<?php

namespace App\Action\Interfaces\Trick;

/**
 * Interface DeleteVideoActionInterface.
 */
interface DeleteVideoActionInterface
{
    /**
     * @param string $id_video
     * @param string $id_trick
     */
    public function __invoke(String $id_video, String $id_trick);
}
