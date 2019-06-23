<?php

namespace Bees\Entity\Character;

/**
 * Class Player
 * @package Bees\Entity\Character
 */
class Player {

    /**
     * The name of the player
     * @var string
     */
    private $name = 'Lefteris';

    /**
     * The player's health
     * @var int
     */
    private $health = 500;

    /**
     * Constant var is used when the player hits
     */
    const USE_BEE_SWATTER = 'hit';

    /**
     * Decreases the player's health
     * @param int $hitPower
     */
    public function hit(int $hitPower): void {
        $this->health -= $hitPower;

        if ($this->health < 0) {
            $this->health = 0;
        }
    }

    /**
     * Returns the player's name
     * @return string
     */
    public function name(): string {
        return $this->name;
    }

    /**
     * Returns the player's health
     * @return int
     */
    public function health(): int {
        return $this->health;
    }

    /**
     * Returns if the player is dead or not
     * @return bool
     */
    public function isDead(): bool {
        return $this->health <= 0 ? true : false;
    }
}