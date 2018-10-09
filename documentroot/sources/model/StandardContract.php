<?php
/**
 * Created by PhpStorm.
 * User: Anel.MUMINOVIC
 * Date: 08.10.2018
 * Time: 14:43
 */

class StandardContract extends Contract
{
    protected $nbMeals;

    /**
     * StandardContract constructor.
     * @param $nbMeals
     */
    public function __construct($description, $signedOn, $fee, $nbMeals)
    {
        parent::$this->__construct($description, $signedOn, $fee);
        $this->nbMeals = $nbMeals;
    }


}