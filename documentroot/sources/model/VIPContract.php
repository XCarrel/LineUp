<?php
    require_once "Contract.php";

    class VIPContract extends Contract {
        protected $restaurant;
        protected $car;

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
         * @return mixed
         */
        public function getCar()
        {
            return $this->car;
        }
    }
?>