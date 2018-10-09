<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 08.10.18
 * Time: 09:55
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
}