<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AngularControllerControllerTest extends WebTestCase
{
    public function testUpdate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Update');
    }

}
