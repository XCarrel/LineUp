<?php
/**
 * Created by PhpStorm.
 * User: Senistan.JEGARAJASIN
 * Date: 01.10.2018
 * Time: 14:20
 */

class artist
{
    private $id;
    private $name;
    private $description;
    private $kind;
    private $country;
    private $picture;
    private $performances;
    private $contract;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * @param mixed $contract
     */
    public function setContract($contract)
    {
        $this->contract = $contract;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param mixed $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getPerformances()
    {
        return $this->performances;
    }

    /**
     * @param mixed $performances
     */
    public function setPerformances($performances)
    {
        $this->performances = $performances;
    }

    public function __construct($id,$name,$description,$kind,$country,$picture)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->kind = $kind;
        $this->country = $country;
        $this->picture = $picture;
    }
    public function __toString()
    {
        return "{$this->name}";
    }
}