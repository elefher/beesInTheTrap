<?php

namespace Bees\Factory;

use Bees\Entity\Hive;

/**
 * A simple factory class which creates a hive
 *
 * Class HiveFactory
 * @package Bees\Entity
 */
class HiveFactory {

    /**
     * Create a default hive of one queen, 8 drone and 5 worker bees
     * @return Hive
     */
    public static function createHive(): Hive {
        $hive = new Hive();

        // Create a queen bee and add it to hive
        $hive->addBee(\Bees\Factory\BeeFactory::createQueen());

        // Create 8 drone bees and add it to the hive
        for ($i = 0; $i < 7; $i++) {
            $hive->addBee(BeeFactory::createDrone());
        }

        // Create 5 worker bees and add it to the hive
        for ($i = 0; $i < 4; $i++) {
            $hive->addBee(BeeFactory::createWorker());
        }

        return $hive;
    }

    /**
     * Create a hive with a queen only
     * @return Hive
     */
    public static function createHiveQueenOnly(): Hive {
        $hive = new Hive();

        // Create a queen bee and add it to hive
        $hive->addBee(\Bees\Factory\BeeFactory::createQueen());
        return $hive;
    }
}