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
     * @param mixed $Lat
     */
    public function setLat($Lat)
    {
        $this->Lat = $Lat;
    }

    /**
     * @return mixed
     */
    public function getLong()
    {
        return $this->Long;
    }

    /**
     * @param mixed $Long
     */
    public function setLong($Long)
    {
        $this->Long = $Long;
    }


}