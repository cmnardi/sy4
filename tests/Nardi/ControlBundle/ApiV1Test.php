<?php
/**
 * Created by PhpStorm.
 * User: caio
 * Date: 20/02/18
 * Time: 06:35
 */

namespace App\Tests\Nardi\ControlBundle;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiV1Test extends WebTestCase
{

    public function testApi()
    {
        $client = static::createClient();
        $client->request('GET', 'v1');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}