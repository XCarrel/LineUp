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
    //private $performances; Will works later on

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