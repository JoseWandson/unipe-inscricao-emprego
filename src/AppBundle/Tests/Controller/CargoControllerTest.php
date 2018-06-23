<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CargoControllerTest extends WebTestCase
{
    public function testSalvar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'cargo/salvar');
    }

}
