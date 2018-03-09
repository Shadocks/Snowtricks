<?php

namespace tests\Form;


use App\Entity\Picture;
use App\Entity\Trick;
use App\Entity\Video;
use App\Form\Extension\PictureTypeExtension;
use App\Form\Extension\VideoTypeExtension;
use App\Form\TrickUpdateType;
use App\Subscriber\Form\Trick\TrickUpdateFieldPictureSubscriber;
use Symfony\Component\Form\PreloadedExtension;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Class TrickUpdateTypeTest
 * @package tests\Form
 */
class TrickUpdateTypeTest extends TypeTestCase
{
    private $picture;

    private $video;

    public function setUp()
    {
        if ($this->video === null) {
            $this->video = $this->createMock(Video::class);
        }

        if ($this->picture === null) {
            $this->picture = $this->createMock(Picture::class);
        }

        parent::setUp();
    }

    public function getExtensions()
    {
        $trickUpdateFieldPictureSubscriber = new TrickUpdateFieldPictureSubscriber();
        $trickAddType = new TrickUpdateType($trickUpdateFieldPictureSubscriber);

        return [new PreloadedExtension(array($trickAddType), array())];
    }

    public function getTypeExtensions()
    {
        return [new PictureTypeExtension(), new VideoTypeExtension()];
    }

    public function testDataPass()
    {
        $object = new Trick();
        $object->setName('720°');
        $object->setCategory('Rotation');
        $object->setDescription('Effectuez deux tours complet');
        $object->addPicture($this->picture);
        $object->addVideo($this->video);

        $form = $this->factory->create(TrickUpdateType::class, $object);

        static::assertTrue($form->isSynchronized());
        static::assertEquals($object, $form->getData());
    }
}
