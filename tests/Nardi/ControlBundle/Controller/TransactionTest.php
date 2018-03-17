<?php
/**
 * Created by PhpStorm.
 * User: caio
 * Date: 20/02/18
 * Time: 06:26
 */

namespace App\Tests\Nardi\ControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TransactionTest extends WebTestCase
{
    private function testListTransactions()
    {
        $client = static::createClient();
        $client->request('GET', '/v1/transaction/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}