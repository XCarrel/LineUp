<?php
/**
 *
 */
require_once "Contract.php";
class StandardContract extends Contract
{
   private $nbMeals;

   function __construct($nbMeals)
   {
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

}

?>
