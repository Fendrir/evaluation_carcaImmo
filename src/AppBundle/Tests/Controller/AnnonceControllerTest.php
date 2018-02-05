<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AnnonceControllerTest extends WebTestCase
{
    public function testAnnoncetab()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/annonce');
    }

    public function testAnnoncepage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/page');
    }

}
