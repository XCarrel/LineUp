<?php
/**
 * Created by PhpStorm.
 * User: David.NIEMBRO
 * Date: 01.10.2018
 * Time: 14:40
 */

abstract class Contract
{
    protected $signedOn;
    protected $description;
    protected $fee;
    /**
     * Contract constructor.
     * @param $description
     * @param $fee
     */
    public function __construct($description, $fee)
    {
        $this->description = $description;
        $this->fee = $fee;
    }
    public function sign()
    {
        $this->signedOn = new DateTime();
    }
    /**
     * Returns the contract type for display.
     * Assumes that the subclasses are name 'xxxContract'
     */
    public function get_type()
    {
        $cls = get_class($this);
        return substr($cls,0,strpos($cls,"Contract"));
    }
}