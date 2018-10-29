<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: Senistan.JEGARAJASIN
 * Date: 08.10.2018
 * Time: 14:39
=======
 * User: Xavier
 * Date: 08.10.18
 * Time: 09:55
>>>>>>> master
 */

abstract class Contract
{
    protected $signedOn;
    protected $description;
    protected $fee;

<<<<<<< HEAD
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

=======
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
>>>>>>> master
}