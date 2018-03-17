<?php
namespace App\Tests\Basic;

use PHPUnit\Framework\TestCase;
use App\Nardi\ControlBundle\Entity\Transaction;

class TransactionTest extends TestCase
{
    public function testBlatz()
    {
        $t = new Transaction();
        $t->setDescription("teste");
        $this->assertEquals($t->getDescription(),"teste");

    }
}
