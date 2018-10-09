<?php
/**
 * Created by PhpStorm.
 * User: Anel.MUMINOVIC
 * Date: 01.10.2018
 * Time: 15:30
 */

class Scene
{
    private $name;
    private $localization;

    /**
     * Scene constructor.
     * @param $name
     * @param $localization
     */
    public function __construct($name, $localization)
    {
        $this->name = $name;
        $this->localization = $localization;
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
    public function getLocalization()
    {
        return $this->localization;
    }


}