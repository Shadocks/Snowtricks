<?php

namespace tests\Service;


use App\Service\PictureUpload;
use PHPUnit\Framework\TestCase;

/**
 * Class PictureUploadTest
 * @package tests\Service
 */
class PictureUploadTest extends TestCase
{
    private $targetDir;

    private $pathPictureTrickDefaultTmp;

    public function setUp()
    {
        if ($this->targetDir === null) {
            $this->targetDir = './../public/upload/picture';
        }

        if ($this->pathPictureTrickDefaultTmp === null) {
            $this->pathPictureTrickDefaultTmp = './../public/img/tmp';
        }

        parent::setUp();
    }

    public function testGetTargetDir()
    {
        $pictureUpload = new PictureUpload($this->targetDir, $this->pathPictureTrickDefaultTmp);

        static::assertEquals($this->targetDir, $pictureUpload->getTargetDir());
    }
}
