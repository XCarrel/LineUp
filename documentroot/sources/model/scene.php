<?php
/**
 * Created by PhpStorm.
 * User: Senistan.JEGARAJASIN
 * Date: 01.10.2018
 * Time: 14:27
 */

class scene
{
    public $name;
    public $localization;

    public function __construct($name,$localization)
    {
        $this->name = $name;
        $this->localization = $localization;
    }
}