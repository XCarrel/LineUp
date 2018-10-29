<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 08.10.18
 * Time: 09:55
 */

class StandardContract extends Contract
{
    protected $nbMeals;

    /**
     * StandardContract constructor.
     * @param $nbMeals
     */
    public function __construct($description, $fee, $nbMeals)
    {
        parent::__construct($description, $fee);
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