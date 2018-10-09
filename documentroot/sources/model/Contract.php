<?php
/**
 * Created by PhpStorm.
 * User: Anel.MUMINOVIC
 * Date: 08.10.2018
 * Time: 14:07
 */

abstract class Contract
{
    protected $signedOn;
    protected $description;
    protected $fee;
    protected $Type;

    /**
     * Contract constructor.
     * @param $signedOn
     * @param $description
     * @param $fee
     */
    public function __construct($signedOn, $description, $fee)
    {
        $this->signedOn = $signedOn;
        $this->description = $description;
        $this->fee = $fee;
    }

    /**
     * @return mixed
     */
    public function getSignedOn()
    {
        return $this->signedOn;
    }


    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @param mixed $fee
     */
    public function setFee($fee)
    {
        $this->fee = $fee;

        return $this;
    }

    public function getType() {

        return get_class($this);
    }





}