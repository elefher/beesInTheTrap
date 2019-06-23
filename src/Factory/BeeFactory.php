<?php

namespace Bees\Factory;

use Bees\Entity\Bee\Bee;
use Bees\Entity\Bee\Drone;
use Bees\Entity\Bee\Queen;
use Bees\Entity\Bee\Worker;

/**
 * A factory class for bees. The static methods create a new instance of a bee kind, either drone, worker or queen
 *
 * Example Usage:
 * The following line returns a new instance of Drone bee
 * $droneBee = BeeFactory::createDrone();
 *
 * Class BeeFactory
 * @package Bees
 */
class BeeFactory {

    /**
     * Returns a new instance of drone bee
     * @return Bee
     */
    public static function createDrone(): Bee {
        return new Drone(hexdec(uniqid()));
    }

    /**
     * Returns a new instance of worker bee
     * @return Bee
     */
    public static function createWorker(): Bee {
        return new Worker(hexdec(uniqid()));
    }

    /**
     * Returns a new instance of queen bee
     * @return Bee
     */
    public static function createQueen(): Bee {
        return new Queen(hexdec(uniqid()));
    }
}