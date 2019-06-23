<?php


namespace Bees\Entity\Bee;

/**
 * This class is usually used as a prototype creating a new kind of bee with different attributes each time
 * Class Bee
 * @package Bees\Entity
 */
class Bee {

    /**
     * A random and unique id for the bee
     * @var int
     */
    protected $id = 0;

    /**
     * Name of the Bee
     * @var string
     */
    protected $name = '';

    /**
     * Health of the bee
     * @var int
     */
    protected $health = 0;

    /**
     * The health damage when gets a hit
     * @var int
     */
    protected $damageHealth = 0;

    /**
     * It's attacking power
     * @var int
     */
    protected $attackPower = 0;

    /**
     * Declares if the bee is the queen or not
     * @var bool
     */
    protected $isQueen = false;

    public function __construct(int $id) {
        $this->id = $id;
    }

    /**
     * Returns the bee's unique id
     * @return int
     */
    public function getId(): int{
        return $this->id;
    }

    /**
     * Returns the name of the bee
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Returns the bee's health
     * @return int
     */
    public function getHealth(): int {
        return $this->health;
    }

    /**
     * Decreases it's health when get's a hit
     */
    public function hit(): void {
        $this->health -= $this->damageHealth;
    }

    /**
     * Returns the bee's attack power
     * @return int
     */
    public function attack(): int {
        return $this->attackPower;
    }

    /**
     * Returns a bool value if the bee is dead or not
     * @return bool
     */
    public function isDead(): bool {
        return $this->health > 0 ? false : true;
    }

    /**
     * Returns true if the bee is the queen
     * @return bool
     */
    public function isQueen(): bool {
        return $this->isQueen;
    }

    /**
     * Returns the number of damage health when a bee gets a hit
     * @return int
     */
    public function getDamageHealth(): int{
        return $this->damageHealth;
    }
}