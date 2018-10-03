<?php
/**
 * Created by PhpStorm.
 * User: David.NIEMBRO
 * Date: 02.10.2018
 * Time: 13:47
 */
require_once ("Artist.php");
require_once ("Performance.php");

function hydrate($model, $datas, $rules){

    $artists=[];
    foreach ($datas as $data) {
        $dataModel = new $model();
        foreach ($rules['fields'] as $field) {
            foreach (array_keys($data) as $key) {
                if ($key == $field['name']) {
                    if($data[$key]!= null){
                        $dataModel->{$field['function']}($data[$key]);
                    }
                }
            }
        }
        $artists[]=$dataModel;
    }
    return $artists;
}