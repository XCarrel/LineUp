<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.10.18
 * Time: 14:59
 */

class Coordinate
{
    private $lat;
    private $long;

    /**
     * Coordinate constructor.
     * @param $lat
     * @param $long
     */
    public function __construct($lat, $long)
    {
        $this->lat = $lat;
        $this->long = $long;
    }


    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return mixed
     */
    public function getLong()
    {
        return $this->long;
    }


}