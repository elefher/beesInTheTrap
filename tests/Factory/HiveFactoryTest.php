<?php

use PHPUnit\Framework\TestCase;
use Bees\Factory\HiveFactory;
use Bees\Entity\Hive;

class HiveFactoryTest extends TestCase {

    /**
     * Test hive factory returns hive instance
     */
    public function testHiveFactoryReturnsHiveInstance(): void {
        $hive = HiveFactory::createHive();
        $this->assertInstanceOf(Hive::class, $hive);
    }
}