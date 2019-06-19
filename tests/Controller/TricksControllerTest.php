<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\TrickRepository;

class TricksControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertFalse($client->getResponse()->isNotFound());
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('h1')->count());
        $this->assertSame(3, $crawler->filter('div.carousel-item')->count());
    }

    public function testShowTrick()
    {
        $client = static::createClient();
        $container = self::$container;
        $trick = $container->get(TrickRepository::class)->findOneBy([]);
        $crawler = $client->request('GET', '/trick/' . $trick->getId());
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
