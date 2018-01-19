<?php

namespace tests\Form;


use App\Entity\Picture;
use App\Entity\User;
use App\Form\RegistrationUserType;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Class ForgotPasswordUserTypeTest
 * @package tests\Form
 */
class RegistrationUserTypeTest extends TypeTestCase
{
    public function testDataPass()
    {
        $picture = $this->createMock(Picture::class);
        $picture->method('getId')
                ->willReturn(0);

        $user = new User();
        $user->setPseudo('Stark');
        $user->setPicture($picture);
        $user->setMail('stark.industry@gmail.com');
        $user->setPassword('veronica');

        $form = $this->factory->create(RegistrationUserType::class, $user);

        static::assertTrue($form->isSynchronized());
        static::assertEquals($user, $form->getData());
    }
}
