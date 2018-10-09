<?php
/**
 *
 */
abstract class Contract
{
   private $signedOn;
   private $description;
   private $fee;

   function __construct($signedOn, $description, $fee)
   {
      $this->signedOn = $signedOn;
      $this->description = $description;
      $this->fee = $fee;
   }


    /**
     * Get the value of Signed On
     *
     * @return mixed
     */
    public function getSignedOn()
    {
        return $this->signedOn;
    }

    /**
     * Get the value of Description
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of Fee
     *
     * @return mixed
     */
    public function getFee()
    {
        return $this->fee;
    }

    public function getType()
    {
      return get_class($this);
    }
}
?>
