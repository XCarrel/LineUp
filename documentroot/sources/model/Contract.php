<?php

    /**
     *
     */
    abstract class Contract
    {
        protected $description;
        protected $fee;

        function __construct($description, $fee)
        {
            $this->description = $description;
            $this->fee = $fee;

        }
        //abstract function sign();

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
         * Set the value of Description
         *
         * @param mixed description
         *
         * @return self
         */
        public function setDescription($description)
        {
            $this->description = $description;

            return $this;
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

        /**
         * Set the value of Fee
         *
         * @param mixed fee
         *
         * @return self
         */
        public function setFee($fee)
        {
            $this->fee = $fee;

            return $this;
        }
        public function getType()
        {

            return get_class($this);
        }

}


 ?>
