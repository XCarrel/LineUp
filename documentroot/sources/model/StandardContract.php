<?php
    require_once "Contract.php";

    class StandardContract extends Contract {
        protected $nbMeals;

        public function __construct($signOn, $description, $fee, $nbMeals)
        {
            parent::__construct($signOn, $description, $fee);
            $this->nbMeals = $nbMeals;
        }

        /**
         * @return mixed
         */
        public function getNbMeals()
        {
            return $this->nbMeals;
        }
    }
?>