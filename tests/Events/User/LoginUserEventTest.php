<?php

namespace tests\Events\User;


use App\Entity\User;
use App\Events\User\LoginUserEvent;
use PHPUnit\Framework\TestCase;

/**
 * Class LoginUserEventTest
 * @package tests\Events\User
 */
class LoginUserEventTest extends TestCase
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
        $loginUserEvent = new LoginUserEvent($this->user);

        static::assertInstanceOf(User::class, $loginUserEvent->getUser());
    }
}
