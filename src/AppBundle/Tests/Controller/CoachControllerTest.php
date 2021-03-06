<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CoachControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/coach/view/Ukraine');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Ukraine national football team coachs', $crawler->filter('h1')->text());

        $client->request('GET', '/coach/view/');
        $this->assertEquals(404, $client->getResponse()->getStatusCode());

        $client->request('GET', '/coach/');
        $this->assertEquals(404, $client->getResponse()->getStatusCode());

        $client->request('GET', "/coach/view/Ukraine-Ukraine Ukraine.Ukraine'");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', '/coach/view/Ukraine1');
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }

    public function testView()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/coach/view/Ukraine/Shevchenko');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Coach info Shevchenko (Ukraine)', $crawler->filter('h1')->text());

        $client->request('GET', "/coach/view/Ukraine/Shevchenko-Petrenko Motrenko.Salogub'");
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $client->request('GET', '/coach/view/Ukraine/Shewchenko1');
        $this->assertEquals(404, $client->getResponse()->getStatusCode());

        $client->request('GET', '/coach/view/Ukraine/Shewchenko/');
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }
}
