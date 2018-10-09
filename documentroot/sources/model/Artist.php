<?php
/**
 * Created by PhpStorm.
 * User: Anel.MUMINOVIC
 * Date: 01.10.2018
 * Time: 14:07
 */


class Artist
{
    private $id;
    private $name;
    private $description;
    private $kind;
    private $country;
    private $picture;
    private $contract;
    private $performances;

    /**
     * Artist constructor.
     * @param $name
     * @param $description
     * @param $kind
     * @param $country
     * @param $picture
     * @param $contract
     * @param $performances
     */
    public function __construct($id, $name, $description, $kind, $country, $picture, $contract)
    {

        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->kind = $kind;
        $this->country = $country;
        $this->picture = $picture;


    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }


    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }


    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
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


}