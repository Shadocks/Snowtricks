<?php

namespace tests\Events\User;


use App\Entity\User;
use App\Events\User\RegistrationUserEvent;
use PHPUnit\Framework\TestCase;

/**
 * Class RegistrationUserEventTest
 * @package tests\Events\User
 */
class RegistrationUserEventTest extends TestCase
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
        $registrationUserEvent = new RegistrationUserEvent($this->user);

        static::assertInstanceOf(User::class, $registrationUserEvent->getUser());
    }
}
