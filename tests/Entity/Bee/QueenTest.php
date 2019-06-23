<?php


use PHPUnit\Framework\TestCase;

class QueenTest extends TestCase {

    /**
     * Test queen id is set correct
     */
    public function testQueenId(): void {
        $queen = new \Bees\Entity\Bee\Queen(100);
        $this->assertEquals(100, $queen->getId());
    }

    /**
     * Test queen bee name
     */
    public function testQueenName(): void {
        $queen = new \Bees\Entity\Bee\Queen(100);
        $this->assertEquals('Queen Bee', $queen->getName());
    }

    /**
     * Test queen health is 100 at first
     */
    public function testQueenHealth(): void {
        $queen = new \Bees\Entity\Bee\Queen(100);
        $this->assertEquals(100, $queen->getHealth());
    }

    /**
     * Test queen's attack power is 3
     */
    public function testQueenAttackPower(): void {
        $queen = new \Bees\Entity\Bee\Queen(100);
        $this->assertEquals(3, $queen->attack());
    }

    /**
     * Test queen's damage health when gets a hit is 8
     */
    public function testQueenDamageHealth(): void {
        $queen = new \Bees\Entity\Bee\Queen(100);
        $this->assertEquals(8, $queen->getDamageHealth());
    }

    /**
     * Test queens's health decreased by 8 when gets a hit
     */
    public function testQueenDecreasesPowerByHit(): void {
        $expectedHealthAfterOneHit = 92;
        $queen = new \Bees\Entity\Bee\Queen(100);
        $queen->hit();
        $this->assertEquals($expectedHealthAfterOneHit, $queen->getHealth());
    }

    /**
     * Test that queen is a Queen
     */
    public function testDroneIsNotQueen(): void {
        $queen = new \Bees\Entity\Bee\Queen(100);
        $this->assertEquals(true, $queen->isQueen());
    }

    /**
     * Test that queen is not dead at first
     */
    public function testQueenIsNotDead(): void {
        $queen = new \Bees\Entity\Bee\Queen(100);
        $this->assertEquals(false, $queen->isDead());
    }

    /**
     * Test that queen is becoming dead when it's health is lower or equal than zero
     */
    public function testQueenIsDeadWhenHealthIsZero(): void {
        $queen = new \Bees\Entity\Bee\Queen(100);

        // Queen gets hit while it's health is greater than zero
        while ($queen->getHealth() > 0){
            $queen->hit();
        }

        $this->assertEquals(true, $queen->isDead());
    }
}