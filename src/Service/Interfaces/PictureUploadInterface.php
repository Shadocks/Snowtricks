<?php

namespace App\Service\Interfaces;

use Symfony\Component\HttpFoundation\File\File;

/**
 * Interface PictureUploadInterface.
 */
interface PictureUploadInterface
{
    /**
     * @param File $file
     *
     * @return mixed
     */
    public function upload(File $file);

    /**
     * @return mixed
     */
    public function getTargetDir();
}
