<?php


namespace Bees\Entity\Bee;


/**
 * Worker is a kind of bee and extends the "prototype" Bee class
 * Class Worker
 * @package Bees\Entity\Bee
 */
class Worker extends \Bees\Entity\Bee\Bee {

    /**
     * Name of the Bee
     * @var string
     */
    protected $name = 'Worker Bee';

    /**
     * Health of the bee
     * @var int
     */
    protected $health = 75;

    /**
     * The health damage when gets a hit
     * @var int
     */
    protected $damageHealth = 10;

    /**
     * It's attacking power
     * @var int
     */
    protected $attackPower = 2;

}