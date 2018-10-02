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

   public function getDatetime()
   {
      return $this->datetime;
   }

   public function getScene()
   {
      return $this->scene;
   }


}
 ?>
