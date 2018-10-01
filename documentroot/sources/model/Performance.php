<?php
/**
 *
 */
class Performance extends Artist
{
   private $datetime;
   private $scene;

   function __construct($datetime, $scene)
   {
      $this->datetime = $datetime;
      $this->scene = $scene;
   }
}
 ?>
