<?php
/**
 * Created by PhpStorm.
 * User: David.NIEMBRO
 * Date: 01.10.2018
 * Time: 14:41
 */

class VIPContract extends Contract
{
    protected $restaurant;
    protected $car;
    /**
     * VIPContract constructor.
     * @param $restaurant
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
    public function getRestaurant()
    {
        return $this->restaurant;
    }
    /**
     * @param mixed $restaurant
     */
    public function setRestaurant($restaurant)
    {
        $this->restaurant = $restaurant;
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