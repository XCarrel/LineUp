<?php
/**
 * Created by PhpStorm.
 * User: Anel.MUMINOVIC
 * Date: 01.10.2018
 * Time: 15:43
 */

class Coordinate
{
    private $Lat;
    private $Long;

    /**
     * Coordinate constructor.
     * @param $Lat
     * @param $Long
     */
    public function __construct($Lat, $Long)
    {
        $this->Lat = $Lat;
        $this->Long = $Long;


    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->Lat;
    }


    /**
     * @return mixed
     */
    public function getLong()
    {
        return $this->Long;
    }



}