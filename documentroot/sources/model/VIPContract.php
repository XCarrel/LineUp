<?php
/**
 * Created by PhpStorm.
 * User: Dardan.Iljazi
 * Date: 01.10.2018
 * Time: 14:45
 */

class VIPContract extends Contract
{
    protected $restaurant;
    protected $car;

    /**
     * VIPContract constructor.
     * @param $restaurants
     * @param $car
     */
    public function __construct($description, $fee, $restaurant, $car)
    {
        parent::__construct($description, $fee);
        $this->restaurant = $restaurant;
        $this->car = $car;
    }

    /**
     * @return mixed
     */
    public function getRestaurants()
    {
        return $this->restaurants;
    }

    /**
     * @param mixed $restaurants
     */
    public function setRestaurants($restaurants)
    {
        $this->restaurants = $restaurants;
    }

    /**
     * @return mixed
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * @param mixed $car
     */
    public function setCar($car)
    {
        $this->car = $car;
    }

}