<?php

namespace tests\Form;

use App\Entity\User;
use App\Form\Type\ForgotPasswordUserType;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Class ForgotPasswordUserTypeTest.
 */
class ForgotPasswordUserTypeTest extends TypeTestCase
{
    public function testDataPass()
    {
        $user = new User();
        $user->setUserName('Thor');

        $form = $this->factory->create(ForgotPasswordUserType::class, $user);

        static::assertTrue($form->isSynchronized());
        static::assertEquals($user, $form->getData());
    }
}
