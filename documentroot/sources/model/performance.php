<?php
/**
 * Created by PhpStorm.
 * User: Senistan.JEGARAJASIN
 * Date: 01.10.2018
 * Time: 14:24
 */

class performance
{
    public $datetime;
    public $duration;
    public $scene;

    public function __construct($datetime,$duration,$scene)
    {
        $this->datetime = $datetime;
        $this->duration = $duration;
        $this->scene = $scene;
    }

}