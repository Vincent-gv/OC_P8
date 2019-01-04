<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function  testIndex()
    {
        $this->client = static::createClient();

        $crawler = $this->client->request('GET', '/');
        $this->assertTrue($this->client->getResponse()->isRedirect());
        $crawler = $this->client->followRedirect();
        $this->assertContains('To Do List app', $crawler->filter('div.container a.navbar-brand')->text());
        $this->assertSame(1, $crawler->selectButton("Se connecter")->count());
    }
}
