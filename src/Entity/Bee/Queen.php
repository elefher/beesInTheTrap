<?php


namespace Bees\Entity\Bee;


/**
 * Queen is a kind of bee and extends the "prototype" class Bee
 * Class Queen
 * @package Bees\Entity\Bee
 */
class Queen extends \Bees\Entity\Bee\Bee {

    /**
     * Name of the Bee
     * @var string
     */
    protected $name = 'Queen Bee';

    /**
     * Health of the bee
     * @var int
     */
    protected $health = 100;

    /**
     * The health damage when gets a hit
     * @var int
     */
    protected $damageHealth = 8;

    /**
     * It's attacking power
     * @var int
     */
    protected $attackPower = 3;

    /**
     * The bee is queen
     * @var bool
     */
    protected $isQueen = true;

}