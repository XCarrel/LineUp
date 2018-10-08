<?php
/**
 * Created by PhpStorm.
 * User: Dardan.Iljazi
 * Date: 01.10.2018
 * Time: 14:45
 */
require_once "iPersistable.php";

abstract class Contract implements iPersistable
{
    protected $signedOn;
    protected $description;
    protected $fee;
    protected $type;

    /**
     * Contract constructor.
     * @param $type
     * @param $description
     * @param $fee
     */
    public function __construct($type, $description, $fee)
    {
        $this->type = $type;
        $this->description  = $description;
        $this->fee          = $fee;
    }

    /**
     * @return mixed
     */
    public function getSignedOn()
    {
        return $this->signedOn;
    }

    /**
     * @param mixed $signedOn
     */
    public function setSignedOn($signedOn)
    {
        $this->signedOn = $signedOn;
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
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function load()
    {
        // TODO: Implement load() method.
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}