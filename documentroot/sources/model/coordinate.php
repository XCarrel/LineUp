<?php
/**
 * Created by PhpStorm.
 * User: Senistan.JEGARAJASIN
 * Date: 01.10.2018
 * Time: 14:27
 */

class coordinate
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