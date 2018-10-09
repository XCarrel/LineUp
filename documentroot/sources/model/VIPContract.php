<?php
    require_once "Contract.php";
    /**
     *
     */
    class VIPContract extends Contract
    {
        protected $restaurant;
        protected $car;

        function __construct($description,$fee,$restaurant, $car)
        {
            parent::__construct($description,$fee);
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
     * Set the value of Restaurant
     *
     * @param mixed restaurant
     *
     * @return self
     */
    public function setRestaurant($restaurant)
    {
        $this->restaurant = $restaurant;

        return $this;
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

    /**
     * Set the value of Car
     *
     * @param mixed car
     *
     * @return self
     */
    public function setCar($car)
    {
        $this->car = $car;

        return $this;
    }

}



 ?>
