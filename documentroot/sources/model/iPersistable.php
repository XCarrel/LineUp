<?php

interface iPersistable
{
    public static function All();
   
    public function load($id);
  
    public function reload();
  
    public function create();

    public function store();

    public function destroy();
}