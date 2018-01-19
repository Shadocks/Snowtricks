<?php

namespace tests\Form;


use App\Entity\User;
use App\Form\ForgotPasswordUserType;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Class ForgotPasswordUserTypeTest
 * @package tests\Form
 */
class ForgotPasswordUserTypeTest extends TypeTestCase
{
    public function testDataPass()
    {
        $user = new User();
        $user->setPseudo('Thor');

        $form = $this->factory->create(ForgotPasswordUserType::class, $user);

        static::assertTrue($form->isSynchronized());
        static::assertEquals($user, $form->getData());
    }
}
