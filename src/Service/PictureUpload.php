<?php

namespace App\Service;


use Symfony\Component\HttpFoundation\File\File;

/**
 * Class PictureUpload
 * @package App\Service
 */
class PictureUpload
{
    /**
     * @var
     */
    private $targetDir;

    /**
     * @var
     */
    private $pathPictureTrickDefaultTmp;

    /**
     * PictureUpload constructor.
     * @param $targetDir
     * @param $pathPictureTrickDefaultTmp
     */
    public function __construct($targetDir, $pathPictureTrickDefaultTmp)
    {
         $this->targetDir = $targetDir;
         $this->pathPictureTrickDefaultTmp = $pathPictureTrickDefaultTmp;
    }

    /**
     * @param File $file
     * @return string
     */
    public function upload(File $file)
    {
        if ($file->getFilename() === 'trick_default.png') {

            copy($file->getPathname(), $this->pathPictureTrickDefaultTmp);
            $file = new File($this->pathPictureTrickDefaultTmp);

            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move($this->getTargetDir(), $fileName);

            return $fileName;
        }

        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        $file->move($this->getTargetDir(), $fileName);

        return $fileName;
    }

    /**
     * @return mixed
     */
    public function getTargetDir()
    {
        return $this->targetDir;
    }
}
