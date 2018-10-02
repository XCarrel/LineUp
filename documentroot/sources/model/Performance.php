<?php
/**
 * Created by PhpStorm.
 * User: Dardan.Iljazi
 * Date: 01.10.2018
 * Time: 14:21
 */

class Performance
{
    private $datetime;
    private $duration;
    private $scene;

    /**
     * Performance constructor.
     * @param $datetime
     * @param $duration
     * @param $scene
     */
    public function __construct($datetime, $duration, $scene)
    {
        $this->datetime = $datetime;
        $this->duration = $duration;
        $this->scene = $scene;
    }

    /**
     * @return mixed
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param mixed $datetime
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getScene()
    {
        return $this->scene;
    }

    /**
     * @param mixed $scene
     */
    public function setScene($scene)
    {
        $this->scene = $scene;
    }

}