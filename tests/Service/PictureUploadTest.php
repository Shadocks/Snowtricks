<?php

namespace tests\Service;

use App\Service\PictureUpload;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class PictureUploadTest.
 */
class PictureUploadTest extends KernelTestCase
{
    private $targetDir;

    private $defaultImagePath;

    private $pictureUpload;

    public function setUp()
    {
        static::bootKernel();

        $this->defaultImagePath = static::$kernel->getContainer()->getParameter('picture_trick_default');

        $this->pictureUpload = new PictureUpload(
            static::$kernel->getContainer()->getParameter('picture_directory'),
            static::$kernel->getContainer()->getParameter('path_picture_trick_default_tmp')
        );

        $this->targetDir = static::$kernel->getContainer()->getParameter('picture_directory');

        parent::setUp();
    }

    public function testGetTargetDir()
    {
        static::assertEquals($this->targetDir, $this->pictureUpload->getTargetDir());
    }

    public function testFileUploadDefault()
    {
        $fileDefault = new File($this->defaultImagePath);

        static::assertNotNull($this->pictureUpload->upload($fileDefault));
    }
}
