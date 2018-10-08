<?php
    abstract class Contract {
        protected $signeOn;
        protected $description;
        protected $fee;

        public function __construct($signOn, $description, $fee)
        {
            $this->signeOn = $signOn;
            $this->description = $description;
            $this->fee = $fee;
        }

        /**
         * @return mixed
         */
        public function getSigneOn()
        {
            return $this->signeOn;
        }

        /**
         * @return mixed
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * @return mixed
         */
        public function getFee()
        {
            return $this->fee;
        }
    }
?>