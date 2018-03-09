<?php

namespace tests\Form;


use App\Entity\User;
use App\Form\ResetPasswordUserType;
use Symfony\Component\Form\Test\TypeTestCase;

class ResetPasswordUserTypeTest extends TypeTestCase
{
    public function testDataPass()
    {
        $user = new User();
        $user->setMail('hulk.green@gmail.com');
        $user->setPassword('lullaby');

        $form = $this->factory->create(ResetPasswordUserType::class, $user);

        static::assertTrue($form->isSynchronized());
        static::assertEquals($user, $form->getData());
    }
}
