<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Entity\User;

class UserControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient(array(), array('PHP_AUTH_USER'=>'admin', 'PHP_AUTH_PW'=>'admin'));

        $crawler = $client->request('GET', '/users');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Edit', $client->getResponse()->getContent());
    }

    public function testNotConnectedList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/users');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertNotContains('Edit', $client->getResponse()->getContent());
    }

    public function testCreate()
    {
        $client = static::createClient(array(), array('PHP_AUTH_USER'=>'admin', 'PHP_AUTH_PW'=>'admin'));

        $crawler = $client->request('GET', '/users/create');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Créer un utilisateur', $client->getResponse()->getContent());

        $form = $crawler->selectButton('Ajouter')->form();
        $form['user[username]'] = 'usertest';
        $form['user[password][first]'] = 'usertest';
        $form['user[password][second]'] = 'usertest';
        $form['user[email]'] = 'usertest@user.com';
        $form['user[roles]'] = 'ROLE_USER';

        $client->submit($form);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('usertest', $client->getResponse()->getContent());

        //$crawler = $client->followRedirect();
        //$this->assertEquals(200, $client->getResponse()->getStatusCode());
        //$this->assertContains('utilisateur a bien été ajouté.', $client->getResponse()->getContent());
    }

    public function testEdit()
    {
        $client = static::createClient(array(), array('PHP_AUTH_USER'=>'admin', 'PHP_AUTH_PW'=>'admin'));

        $crawler = $client->request('GET', '/users');
        $link = $crawler->selectLink('Edit')->last()->link();
        $crawler = $client->click($link);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('usertest', $client->getResponse()->getContent());
        $this->assertSame(1, $crawler->selectButton("Modifier")->count());
    }
}
