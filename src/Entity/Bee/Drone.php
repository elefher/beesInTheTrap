<?php


namespace Bees\Entity\Bee;



/**
 * Drone is a kind of bee and extends the Bee class
 * Class Drone
 * @package Bees\Entity\Bee
 */
class Drone extends \Bees\Entity\Bee\Bee {

    /**
     * Name of the Bee
     * @var string
     */
    protected $name = 'Drone Bee';

    /**
     * Health of the bee
     * @var int
     */
    protected $health = 50;

    /**
     * The health damage when gets a hit
     * @var int
     */
    protected $damageHealth = 12;

    /**
     * It's attacking power
     * @var int
     */
    protected $attackPower = 1;

}