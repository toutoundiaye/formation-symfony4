<?php

namespace App\Service\Tests;

use App\Entity\Worker;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

class CongeesPayesTest extends TestCase
{
    public function testCalculCongees()
    {
        $worker = new Worker();

        $this->assertInstanceOf(Worker::class, $worker, '$worker is not an instance of Worker');
        return $worker;
    }

    /**
     * @dataProvider provideAccessorValues
     * @depends testCreate
     */
    public function testFill(string $name, string $value, Worker $worker)
    {
        $getter = "get$name";
        $setter = "set$name";

        $worker->$setter($value);

        $this->assertSame($value, $worker->$getter());
    }

    public function provideAccessorValues(): array
    {
        return [
            ['LastName', 'Gruh'],
            ['FirstName', 'Jean'],
            ['WorkingTime', '23.5'],
        ];
    }
}
