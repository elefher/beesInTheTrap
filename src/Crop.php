<?php

namespace Bees;

use Bees\Entity\Character\Player;
use Bees\Entity\Hive;

/**
 * Class Crop
 * @package Bees
 */
class Crop {

    /**
     * Property that used to declare the status of the crop
     */
    const BURNED_TO_ASHES = 'burnedToAshes';

    /**
     * Property that used to declare the status of the crop
     */
    const PUT_OUT_FIRE = 'putOutFire';

    /**
     * Crop status
     * @var
     */
    private $status;

    /**
     * Property for player instance
     * @var
     */
    private $player = null;

    /**
     * A property which contains bees
     * @var array
     */
    private $hive = null;

    public function __construct(Player $player, Hive $hive) {
        // Set the init status of the crop
        $this->setStatus(self::PUT_OUT_FIRE);

        // Set the player
        $this->player = $player;

        // Set the hive
        $this->hive = $hive;
    }

    /**
     * Run scene
     * @param string $input
     */
    public function runScene(string $input): void {
        // If player's input is 'hit', attack on a bee
        if ($input == Player::USE_BEE_SWATTER) {
            // Make an attack on a random bee
            $this->attackOnBees();
        } else {
            $this->printLog("Unknown command. Try to type 'hit'\n");
            return ;
        }

        // Check if the hive is still alive
        if(!$this->hive->isHiveAlive()){
            $this->printLog("You win! The whole hive is dead, Now you need to run and save your crops from the fire!\n");
            exit();
        }

        // Get a bee from the hive
        $bee = $this->hive->getRandomBee();

        // A bee from the hive attacks
        $attackPower = $bee->attack();

        // Player's life is decreasing
        $this->player->hit($attackPower);

        $this->printLog("System: A bee is attacking you. Your health decreased by " . $attackPower . " points, your health now is " . $this->player->health() . "\n");

        // If player's dies change status to "burned to ashes"
        if ($this->player->isDead()){
            $this->printLog("You Lost all your health from the bees and you cannot save your crops anymore.\n");
            $this->setStatus(self::BURNED_TO_ASHES);
        }
    }

    /**
     * The player hits a random bee and if the bee is dead removed from the hive
     */
    private function attackOnBees(): void {
        // Get a random bee from the entity array
        $bee = $this->hive->getRandomBee();

        // A bee gets a hit.
        $bee->hit();

        $this->printLog("You just hit a " . $bee->getName() . ", and it's health decreased by " . $bee->getDamageHealth() . " points!\n");

        // Update the hive
        $this->hive->updateHive($bee);
    }

    /**
     * Sets crop status
     * @param string $status
     */
    public function setStatus(string $status): void {
        $this->status = $status;
    }

    /**
     * Returns crop status
     * @return string
     */
    public function getStatus(): string {
        return $this->status;
    }

    /**
     * Returns a boolean if the game is over or not
     * @return bool
     */
    public function isGameOver(): bool{
        return $this->status == \Bees\Crop::BURNED_TO_ASHES;
    }

    /**
     * Appends a text into message array
     * @param string $log
     */
    private function printLog(string $log): void {
        echo $log;
    }
}