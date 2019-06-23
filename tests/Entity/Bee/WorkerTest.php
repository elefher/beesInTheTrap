<?php


use PHPUnit\Framework\TestCase;

class WorkerTest extends TestCase {

    /**
     * Test worker id is set correct
     */
    public function testWorkerId(): void {
        $worker = new \Bees\Entity\Bee\Worker(100);
        $this->assertEquals(100, $worker->getId());
    }

    /**
     * Test worker bee name
     */
    public function testWorkerName(): void {
        $worker = new \Bees\Entity\Bee\Worker(100);
        $this->assertEquals('Worker Bee', $worker->getName());
    }

    /**
     * Test worker health is 75 at first
     */
    public function testWorkerHealth(): void {
        $worker = new \Bees\Entity\Bee\Worker(100);
        $this->assertEquals(75, $worker->getHealth());
    }

    /**
     * Test worker's attack power is 2
     */
    public function testWorkerAttackPower(): void {
        $worker = new \Bees\Entity\Bee\Worker(100);
        $this->assertEquals(2, $worker->attack());
    }

    /**
     * Test worker's damage health when gets a hit is 10
     */
    public function testworkerDamageHealth(): void {
        $worker = new \Bees\Entity\Bee\Worker(100);
        $this->assertEquals(10, $worker->getDamageHealth());
    }

    /**
     * Test worker's health decreased by 10 when gets a hit
     */
    public function testWorkerDecreasesPowerByHit(): void {
        $expectedHealthAfterOneHit = 65;
        $worker = new \Bees\Entity\Bee\Worker(100);
        $worker->hit();
        $this->assertEquals($expectedHealthAfterOneHit, $worker->getHealth());
    }

    /**
     * Test that worker is not a Queen
     */
    public function testWorkerIsNotQueen(): void {
        $worker = new \Bees\Entity\Bee\Worker(100);
        $this->assertEquals(false, $worker->isQueen());
    }

    /**
     * Test that worker is not dead at first
     */
    public function testWorkerIsNotDead(): void {
        $worker = new \Bees\Entity\Bee\Worker(100);
        $this->assertEquals(false, $worker->isDead());
    }

    /**
     * Test that worker is becoming dead when it's health is lower or equal than zero
     */
    public function testWorkerIsDeadWhenHealthIsZero(): void {
        $worker = new \Bees\Entity\Bee\Worker(100);

        // Queen gets hit while it's health is greater than zero
        while ($worker->getHealth() > 0){
            $worker->hit();
        }

        $this->assertEquals(true, $worker->isDead());
    }
}