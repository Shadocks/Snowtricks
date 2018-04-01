<?php

namespace tests\Form;

use App\Entity\User;
use App\Form\Type\ResetPasswordUserType;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Class ResetPasswordUserTypeTest.
 */
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
