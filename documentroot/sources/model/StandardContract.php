<?php
/**
 * Created by PhpStorm.
 * User: Dardan.Iljazi
 * Date: 01.10.2018
 * Time: 14:46
 */

class StandardContract
{
    private $nbMeals;

    /**
     * StandardContract constructor.
     * @param $nbMeals
     */
    public function __construct($nbMeals)
    {
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