<?php


namespace Bees\Entity;


use Bees\Entity\Bee\Bee;

/**
 * Class Hive
 * @package Bees\Entity
 */
class Hive {

    /**
     * Private var is going to keep all the bees
     * @var array
     */
    private $hive = [];

    /**
     * Append a bee into the hive
     * @param Bee $bee
     */
    public function addBee(Bee $bee): void {
        $this->hive[$bee->getId()] = $bee;
    }

    /**
     * Returns a random bee from the hive
     * @return Bee
     */
    public function getRandomBee(): Bee {
        $beeId = array_rand($this->hive);
        return $this->hive[$beeId];
    }

    /**
     * Returns a bee for the given bee id
     * @param int $beeId
     * @return Bee|null
     */
    public function getBee(int $beeId): ?Bee{
        return array_key_exists($beeId, $this->hive) ? $this->hive[$beeId] : null;
    }

    /**
     * Deletes the given bee if it is dead
     * @param Bee $bee
     */
    public function updateHive(Bee $bee): void {
        // Check if bee is dead and is the queen one and delete all of them
        $isQueenDead = $bee->isQueen() && $bee->isDead();
        if ($isQueenDead) {
            $this->hive = [];
        } elseif ($bee->isDead()) {
            unset($this->hive[$bee->getId()]);
        }
    }

    /**
     * Returns a true or false if the hive is still alive
     * @return bool
     */
    public function isHiveAlive(): bool {
        return sizeof($this->hive) > 0 ? true : false;
    }
}