<?php


use Bees\Entity\Character\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase {

    /**
     * Tests that player's word is set to 'hit' when he wants to attack
     */
    public function testPlayerAttacksWithHit(): void {
        $this->assertEquals('hit', Player::USE_BEE_SWATTER);
    }

    /**
     * Tests that player is NOT dead at first
     */
    public function testPlayerIsAlive(): void {
        $player = new Player();
        $this->assertEquals(false, $player->isDead());
    }

    /**
     * Tests that player is dead when his health is zero
     */
    public function testPlayerIsDeadWHenHealthIsZero(): void {
        $player = new Player();

        while($player->health() > 0){
            $player->hit(1);
        }

        $this->assertEquals(true, $player->isDead());
    }
}