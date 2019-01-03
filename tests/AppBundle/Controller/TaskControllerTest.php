<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Entity\Task;

class TaskControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient(array(), array('PHP_AUTH_USER'=>'admin', 'PHP_AUTH_PW'=>'admin'));

        $crawler = $client->request('GET', '/tasks');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testNotConnectedList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tasks');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function testCreate()
    {
        $client = static::createClient(array(), array('PHP_AUTH_USER'=>'admin', 'PHP_AUTH_PW'=>'admin'));

        $crawler = $client->request('GET', '/tasks');
        $link = $crawler->selectLink('Créer une tâche')->link();
        $crawler = $client->click($link);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->selectButton("Ajouter")->count());

        $form = $crawler->selectButton('Ajouter')->form();
        $form['task[title]'] = 'test create title';
        $form['task[content]'] = 'test create content';

        $client->submit($form);

        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        $crawler = $client->followRedirect();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('test create title', $client->getResponse()->getContent());
        $this->assertContains('test create content', $client->getResponse()->getContent());
    }

    public function testEdit()
    {
        $client = static::createClient(array(), array('PHP_AUTH_USER'=>'admin', 'PHP_AUTH_PW'=>'admin'));

        $crawler = $client->request('GET', '/tasks');
        $link = $crawler->selectLink('test create title')->link();
        $crawler = $client->click($link);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->selectButton("Modifier")->count());

        $form = $crawler->selectButton('Modifier')->form();
        $form['task[title]'] = 'test create title edited';
        $form['task[content]'] = 'test create content edited version';

        $client->submit($form);

        $this->assertEquals(302, $client->getResponse()->getStatusCode());

        $crawler = $client->followRedirect();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('test create title edited', $client->getResponse()->getContent());
        $this->assertContains('test create content edited version', $client->getResponse()->getContent());
    }

    public function testDelete()
    {
        $client = static::createClient(array(), array('PHP_AUTH_USER'=>'admin', 'PHP_AUTH_PW'=>'admin'));

        $crawler = $client->request('GET', '/tasks');
        $form = $crawler->selectButton('Supprimer')->last()->form();
        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertNotContains('test create title edited', $client->getResponse()->getContent());
    }
}
