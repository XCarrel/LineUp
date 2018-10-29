<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: Senistan.JEGARAJASIN
 * Date: 08.10.2018
 * Time: 14:45
 */

require_once('Contract.php');

=======
 * User: Xavier
 * Date: 08.10.18
 * Time: 09:55
 */

>>>>>>> master
class StandardContract extends Contract
{
    protected $nbMeals;

<<<<<<< HEAD
    public function __construct($description,$fee,$nbMeals)
    {
        parent::__construct($description,$fee);
=======
    /**
     * StandardContract constructor.
     * @param $nbMeals
     */
    public function __construct($description, $fee, $nbMeals)
    {
        parent::__construct($description, $fee);
>>>>>>> master
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

<<<<<<< HEAD

=======
>>>>>>> master
}