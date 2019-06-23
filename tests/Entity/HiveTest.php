<?php


use PHPUnit\Framework\TestCase;
use Bees\Entity\Hive;
use Bees\Entity\Bee\Worker;
use Bees\Entity\Bee\Drone;
use Bees\Entity\Bee\Queen;

class HiveTest extends TestCase {

    /**
     * Tests that hive still contains bees
     */
    public function testHiveIsAlive(): void {
        $workerMock = $this->getMockBuilder(Worker::class)
            ->disableOriginalConstructor()
            ->getMock();

        $hive = new Hive();
        $hive->addBee($workerMock);
        $this->assertEquals(true, $hive->isHiveAlive());
    }

    /**
     * Test that hive is dead when doesn't have bees
     */
    public function testHiveIsDeadWhenDoesNotHaveBees(): void {
        $hive = new Hive();
        $this->assertEquals(false, $hive->isHiveAlive());
    }

    /**
     * Test that hive is turned into dead when the queen bee is dead
     */
    public function testHiveBecomesDeadWhenQueenIsDead(): void {
        $workerMock = $this->getMockBuilder(Worker::class)
            ->disableOriginalConstructor()
            ->getMock();

        $droneMock = $this->getMockBuilder(Drone::class)
            ->disableOriginalConstructor()
            ->getMock();

        $queenBeeId = 3;
        $queenMock = $this->getMockBuilder(Queen::class)
            ->setConstructorArgs([$queenBeeId])
            ->setMethods(['getId'])
            ->getMock();

        $queenMock->method('getId')->willReturn($queenBeeId);

        // Add some bees into hive
        $hive = new Hive();
        $hive->addBee($workerMock);
        $hive->addBee($droneMock);
        $hive->addBee($queenMock);

        // Kill the queen bee
        $bee = $hive->getBee($queenBeeId);

        while ($bee->getHealth() > 0) {
            $bee->hit();
        }

        // Update the hive after killing the queen bee
        $hive->updateHive($bee);

        $this->assertEquals(false, $hive->isHiveAlive());
    }

    /**
     * Test that hive deletes the bee when it is dead
     */
    public function testHiveDeletesTheBeeWhichIsDead(): void {
        $droneBeeId = 11;
        $droneMock = $this->getMockBuilder(Drone::class)
            ->setConstructorArgs([$droneBeeId])
            ->setMethods(['getId'])
            ->getMock();
        $droneMock->method('getId')->willReturn($droneBeeId);

        $workerBeeId = 22;
        $workerMock = $this->getMockBuilder(Worker::class)
            ->setConstructorArgs([$workerBeeId])
            ->setMethods(['getId'])
            ->getMock();
        $workerMock->method('getId')->willReturn($workerBeeId);

        $hive = new Hive();
        $hive->addBee($droneMock);
        $hive->addBee($workerMock);

        // Kill a bee
        $bee = $hive->getBee($workerBeeId);

        while ($bee->getHealth() > 0) {
            $bee->hit();
        }

        // Update the hive after killing the queen bee
        $hive->updateHive($bee);

        // Check the worker bee doesn't exist anymore in the hive
        $this->assertNull($hive->getBee($workerBeeId));

        // But the hive must be alive
        $this->assertEquals(true, $hive->isHiveAlive());
    }
}