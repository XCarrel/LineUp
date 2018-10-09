<?php
/**
 *
 */
class Artist
{
   private $id;
   private $name;
   private $description;
   private $kind;
   private $country;
   private $picture;
   private $contract;
   private $performances;

   function __construct($id, $name, $description, $kind, $country, $picture, $contract)
   {
      $this->id = $id;
      $this->name = $name;
      $this->description = $description;
      $this->kind =$kind;
      $this->country = $country;
      $this->picture = $picture;
      $this->contract = $contract;
   }

   public function getId()
   {
      return $this->id;
   }

   public function getName()
   {
      return $this->name;
   }

   public function getDescription()
   {
      return $this->description;
   }

   public function getKind()
   {
      return $this->kind;
   }

   public function getCountry()
   {
      return $this->country;
   }

   public function getPicture()
   {
      return $this->picture;
   }

   public function getContract()
   {
      return $this->contract;
   }

   public function setContract($Contract)
   {
      $this->contract = $Contract;
   }

   public function getPerformances()
   {
      return $this->performances;
   }

   public function setPerformances($performances)
   {
      $this->performances = $performances;
   }

}
?>
