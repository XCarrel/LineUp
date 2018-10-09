<?php
/**
 * Created by PhpStorm.
 * User: Senistan.JEGARAJASIN
 * Date: 08.10.2018
 * Time: 14:39
 */

abstract class Contract
{
    protected $signedOn;
    protected $description;
    protected $fee;

    function __construct($description, $fee)
    {
        $this->description = $description;
        $this->fee = $fee;
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

    /**
     * @return mixed
     */
    public function getSignedOn()
    {
        return $this->signedOn;
    }

    /**
     * @return string Classe hérité utilisé
     */
    public function getType(){
        return get_class($this);
    }

}