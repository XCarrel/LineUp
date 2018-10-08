<?php
/**
 * Created by PhpStorm.
 * User: Dardan.Iljazi
 * Date: 01.10.2018
 * Time: 14:46
 */

class StandardContract extends Contract
{
    private $nbMeals;

    /**
     * StandardContract constructor.
     * @param $nbMeals
     */
    public function __construct($description, $fee, $nbMeals)
    {
        parent::__construct(2, $description, $fee);
        $this->nbMeals = $nbMeals;
    }

    /**
     * @return mixed
     */
    public function getNbMeals()
    {
        return $this->nbMeals;
    }

    /**
     * @param mixed $nbMeals
     */
    public function setNbMeals($nbMeals)
    {
        $this->nbMeals = $nbMeals;
    }
}