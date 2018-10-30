<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 01.10.18
 * Time: 15:31
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
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @return mixed
     */
    public function getScene()
    {
        return $this->scene;
    }


}