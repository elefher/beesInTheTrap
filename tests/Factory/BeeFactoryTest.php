<?php


use PHPUnit\Framework\TestCase;
use Bees\Factory\BeeFactory;
use Bees\Entity\Bee\Queen;
use Bees\Entity\Bee\Worker;
use Bees\Entity\Bee\Drone;

class BeeFactoryTest extends TestCase {

    /**
     * Test drone class is instance of Bee class
     */
    public function testFactoryReturnsDrone(): void {
        $drone = BeeFactory::createDrone();
        $this->assertInstanceOf(Drone::class, $drone);
    }

    /**
     * Test worker class is instance of Bee class
     */
    public function testFactoryReturnsWorker(): void {
        $worker = BeeFactory::createWorker();
        $this->assertInstanceOf(Worker::class, $worker);
    }

    /**
     * Test queen class is instance of Bee class
     */
    public function testFactoryReturnsQueen(): void {
        $queen = BeeFactory::createQueen();
        $this->assertInstanceOf(Queen::class, $queen);
    }
}