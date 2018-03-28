<?php

namespace App\Service;

use App\Service\Interfaces\PictureUploadInterface;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class PictureUpload.
 */
class PictureUpload implements PictureUploadInterface
{
    /**
     * @var string
     */
    private $targetDir;

    /**
     * @var string
     */
    private $pathPictureTrickDefaultTmp;

    /**
     * PictureUpload constructor.
     *
     * @param string $targetDir
     * @param string $pathPictureTrickDefaultTmp
     */
    public function __construct(
        string $targetDir,
        string $pathPictureTrickDefaultTmp
    ) {
        $this->targetDir = $targetDir;
        $this->pathPictureTrickDefaultTmp = $pathPictureTrickDefaultTmp;
    }

    /**
     * @param File $file
     *
     * @return string
     */
    public function upload(File $file)
    {
        if ('trick_default.png' === $file->getFilename()) {
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
