<?php

namespace Tests\AppBundle\Entity;

use PHPUnit\Framework\TestCase;
use AppBundle\Entity\User;
use AppBundle\Entity\Task;

class EntityTest extends TestCase
{

    public function testTaskGetTitle()
    {
        $task = new Task();
        $task->setTitle('title');

        $this->assertSame('title', $task->getTitle());
    }

    public function testTaskGetContent()
    {
        $task = new Task();
        $task->setContent('content');

        $this->assertSame('content', $task->getContent());
    }

    public function testTaskGetCreatedAt()
    {
        $task = new Task();
        $date = new \Datetime();
        $task->setCreatedAt($date);

        $this->assertSame($date, $task->getCreatedAt());
    }

    public function testTaskGetUser()
    {
        $task = new Task();
        $user = new User();
        $task->setUser($user);

        $this->assertSame($user, $task->getUser());
    }

    public function testUserGetUsername()
    {
        $task = new User();
        $task->setUsername('name');

        $this->assertSame('name', $task->getUsername());
    }

    public function testUserGetPassword()
    {
        $task = new User();
        $task->setPassword('password');

        $this->assertSame('password', $task->getPassword());
    }

    public function testUserGetEmail()
    {
        $task = new User();
        $task->setEmail('test@test.com');

        $this->assertSame('test@test.com', $task->getEmail());
    }

    public function testUserGetRoles()
    {
        $user = new User();
        $user->setRoles(['ROLE_ADMIN']);
        $this->assertEquals(['ROLE_ADMIN'], $user->getRoles());
    }

}
