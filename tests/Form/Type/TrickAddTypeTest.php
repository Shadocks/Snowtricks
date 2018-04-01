<?php

namespace tests\Form;

use App\Entity\Picture;
use App\Entity\Trick;
use App\Entity\Video;
use App\Form\Extension\PictureTypeExtension;
use App\Form\Extension\VideoTypeExtension;
use App\Form\Type\TrickAddType;
use App\Subscriber\Form\Trick\TrickAddTypeSubscriber;
use Symfony\Component\Form\PreloadedExtension;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Class TrickTypeTest.
 */
class TrickAddTypeTest extends TypeTestCase
{
    private $picture;

    private $video;

    public function setUp()
    {
        if (null === $this->video) {
            $this->video = $this->createMock(Video::class);
        }

        if (null === $this->picture) {
            $this->picture = $this->createMock(Picture::class);
        }

        parent::setUp();
    }

    public function getExtensions()
    {
        $pictureTrickDefault = 'public/img/trick_default.png';
        $trickAddFieldPictureSubscriber = new TrickAddTypeSubscriber($pictureTrickDefault);
        $trickAddType = new TrickAddType($trickAddFieldPictureSubscriber);

        return [new PreloadedExtension([$trickAddType], [])];
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

        $form = $this->factory->create(TrickAddType::class, $object);

        static::assertTrue($form->isSynchronized());
        static::assertEquals($object, $form->getData());
    }
}
