<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient(array(), array('PHP_AUTH_USER'=>'admin', 'PHP_AUTH_PW'=>'admin'));

        $crawler = $client->request('GET', '/login');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', '/', array(), array(), array(
            'PHP_AUTH_USER' => 'admin',
            'PHP_AUTH_PW'   => 'admin',
        ));

        $this->assertFalse($client->getResponse()->isRedirect());
        $this->assertContains('Bienvenue sur Todo List,', $client->getResponse()->getContent());
    }
}
