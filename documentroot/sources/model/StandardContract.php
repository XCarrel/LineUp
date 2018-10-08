<?php
/**
 * Created by PhpStorm.
 * User: Senistan.JEGARAJASIN
 * Date: 08.10.2018
 * Time: 14:45
 */

class StandardContract extends Contract
{
    protected $nbMeals;

    public function __construct($description,$fee,$nbMeals)
    {
        parent::__construct($description,$fee);
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