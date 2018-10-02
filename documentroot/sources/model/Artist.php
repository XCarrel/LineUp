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

   function __construct($id, $name, $description, $kind, $country, $picture, $contract, $performances)
   {
      $this->id = $id;
      $this->name = $name;
      $this->description = $description;
      $this->kind =$kind;
      $this->country = $country;
      $this->picture = $picture;
      $this->contract = $contract;
      $this->performances = $this->getPerformances();
   }

   public function getId()
   {
      return $this->id;
   }

   public function setId($id)
   {
      $this->id = $id;
   }

   public function getName()
   {
      return $this->name;
   }

   public function setName($name)
   {
      $this->name = $name;
   }

   public function getDescription()
   {
      return $this->description;
   }

   public function setDescription($description)
   {
      $this->description = $description;
   }

   public function getKind()
   {
      return $this->kind;
   }

   public function setKind($kind)
   {
      $this->kind = $kind;
   }

   public function getCountry()
   {
      return $this->country;
   }

   public function setCountry($country)
   {
      $this->country = $country;
   }

   public function getPicture()
   {
      return $this->picture;
   }

   public function setPicture($picture)
   {
      $this->picture = $picture;
   }

   public function getContract()
   {
      return $this->contract;
   }

   public function setContract($contract)
   {
      $this->contract = $contract;
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
