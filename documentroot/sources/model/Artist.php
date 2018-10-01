<?php
/**
 *
 */
class Artist
{
   public $id;
   private $name;
   private $description;
   private $kind;
   private $country;
   private $picture;
   private $contract;
   private $performances;

   function __construct($id, $name, $description, $kind, $country, $picture, $contract, $performances)
   {
      $this->id = $id;
      $this->name = $name;
      $this->description = $description;
      $this->kind = $kind;
      $this->country = $country;
      $this->picture = $picture;
      $this->contract = $contract;
      $this->performances = $performances;
   }
}
?>
