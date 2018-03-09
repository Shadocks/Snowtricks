<?php

namespace tests\Events\User;


use App\Entity\User;
use App\Events\User\ResetPasswordUserEvent;
use PHPUnit\Framework\TestCase;

/**
 * Class ResetPasswordUserEventTest
 * @package tests\Events\User
 */
class ResetPasswordUserEventTest extends TestCase
{
    private $user;

    public function setUp()
    {
        if ($this->user === null) {
            $this->user = $this->createMock(User::class);
        }
    }

    public function testGetUser()
    {
        $resetPasswordUserEvent = new ResetPasswordUserEvent($this->user);

        static::assertInstanceOf(User::class, $resetPasswordUserEvent->getUser());
    }
}
