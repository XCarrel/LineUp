<?php
/**
 *
 */
require_once "Contract.php";
class VIPContract extends Contract
{
   private $restaurant;
   private $car;

   function __construct($restaurant, $car)
   {
      $this->restaurant = $restaurant;
      $this->car = $car;
   }

    /**
     * Get the value of Restaurant
     *
     * @return mixed
     */
    public function getRestaurant()
    {
        return $this->restaurant;
    }

    /**
     * Get the value of Car
     *
     * @return mixed
     */
    public function getCar()
    {
        return $this->car;
    }

}

?>
