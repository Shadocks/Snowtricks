<?php

namespace tests\Form;


use App\Entity\Picture;
use App\Entity\Trick;
use App\Entity\Video;
use App\Form\TrickType;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Class TrickTypeTest
 * @package tests\Form
 */
class TrickTypeTest extends TypeTestCase
{

    public function testDataPass()
    {
        $picture = $this->createMock(Picture::class);
        $picture->method('getId')
                ->willReturn(1);

        $video = $this->createMock(Video::class);
        $video->method('getId')
              ->willReturn(2);


        $object = new Trick();
        $object->setName('720°');
        $object->setCategory('Rotation');
        $object->setDescription('Effectuez deux tours complet');
        $object->setPicture($picture);
        $object->setVideo($video);

        $form = $this->factory->create(TrickType::class, $object);

        static::assertTrue($form->isSynchronized());
        static::assertEquals($object, $form->getData());
    }
}
