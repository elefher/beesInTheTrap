<?php


use PHPUnit\Framework\TestCase;

class DroneTest extends TestCase {

    /**
     * Test drone id is set correct
     */
    public function testDroneId(): void {
        $drone = new \Bees\Entity\Bee\Drone(100);
        $this->assertEquals(100, $drone->getId());
    }

    /**
     * Test drone bee name
     */
    public function testDroneName(): void {
        $drone = new \Bees\Entity\Bee\Drone(100);
        $this->assertEquals('Drone Bee', $drone->getName());
    }

    /**
     * Test drone health is 50 at first
     */
    public function testDroneHealth(): void {
        $drone = new \Bees\Entity\Bee\Drone(100);
        $this->assertEquals(50, $drone->getHealth());
    }

    /**
     * Test drone's attack power is 1
     */
    public function testDroneAttackPower(): void {
        $drone = new \Bees\Entity\Bee\Drone(100);
        $this->assertEquals(1, $drone->attack());
    }

    /**
     * Test drone's damage health when gets a hit is 12
     */
    public function testDroneDamageHealth(): void {
        $drone = new \Bees\Entity\Bee\Drone(100);
        $this->assertEquals(12, $drone->getDamageHealth());
    }

    /**
     * Test drone's health decreased by 12 when gets a hit
     */
    public function testDroneDecreasePowerByHit(): void {
        $expectedHealthAfterOneHit = 38;
        $drone = new \Bees\Entity\Bee\Drone(100);
        $drone->hit();
        $this->assertEquals($expectedHealthAfterOneHit, $drone->getHealth());
    }

    /**
     * Test that drone is not a Queen
     */
    public function testDroneIsNotQueen(): void {
        $drone = new \Bees\Entity\Bee\Drone(100);
        $this->assertNotEquals(true, $drone->isQueen());
    }

    /**
     * Test that drone is not dead at first
     */
    public function testDroneIsNotDead(): void {
        $drone = new \Bees\Entity\Bee\Drone(100);
        $this->assertEquals(false, $drone->isDead());
    }

    /**
     * Test that drone is becoming dead when it's health is lower or equal than zero
     */
    public function testDroneIsDeadWhenHealthIsZero(): void {
        $drone = new \Bees\Entity\Bee\Drone(100);

        // Drone gerts hit while it's health is greater than zero
        while ($drone->getHealth() > 0){
            $drone->hit();
        }

        $this->assertEquals(true, $drone->isDead());
    }
}