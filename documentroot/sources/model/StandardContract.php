<?php
    require_once "Contract.php";
    /**
     *
     */
    class StandardContract extends Contract
    {
        protected $nbMeals;

        function __construct($description,$fee,$nbMeals)
        {
            parent::__construct($description,$fee);
            $this->nbMeals = $nbMeals;
        }


    /**
     * Get the value of Nb Meals
     *
     * @return mixed
     */
    public function getNbMeals()
    {
        return $this->nbMeals;
    }

    /**
     * Set the value of Nb Meals
     *
     * @param mixed nbMeals
     *
     * @return self
     */
    public function setNbMeals($nbMeals)
    {
        $this->nbMeals = $nbMeals;

        return $this;
    }

}


 ?>
