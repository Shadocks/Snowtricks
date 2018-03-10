<?php

namespace tests\Form;


use App\Entity\Picture;
use App\Entity\User;
use App\Form\Extension\PictureTypeExtension;
use App\Form\RegistrationUserType;
use App\Subscriber\Form\User\UserPictureSubscriber;
use Symfony\Component\Form\PreloadedExtension;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Class ForgotPasswordUserTypeTest
 * @package tests\Form
 */
class RegistrationUserTypeTest extends TypeTestCase
{
    private $picture;

    public function setUp()
    {
        if ($this->picture === null) {
            $this->picture = $this->createMock(Picture::class);;
        }

        parent::setUp();
    }

    public function getExtensions()
    {
        $pictureUserDefault = '/public/img/avatarDefault.png';
        $serPictureSubscriber = new UserPictureSubscriber($this->picture, $pictureUserDefault);
        $registrationUserType = new RegistrationUserType($serPictureSubscriber);

        return [new PreloadedExtension(array($registrationUserType), array())];
    }

    public function getTypeExtensions()
    {
        return [new PictureTypeExtension()];
    }

    public function testDataPass()
    {
        $user = new User();
        $user->setUserName('Stark');
        $user->setPicture($this->picture);
        $user->setMail('stark.industry@gmail.com');
        $user->setPassword('veronica');

        $form = $this->factory->create(RegistrationUserType::class, $user);

        static::assertTrue($form->isSynchronized());
        static::assertEquals($user, $form->getData());
    }
}
