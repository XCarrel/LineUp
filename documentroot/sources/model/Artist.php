<?php
    class Artist {
        private $id;
        private $name;
        private $description;
        private $kind;
        private $country;
        private $picture;
        private $performances;
        private $contract;

        public function __construct($id, $name, $description, $kind, $country, $picture)
        {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->kind = $kind;
            $this->country = $country;
            $this->picture = $picture;
        }

        /**
         * @param mixed $performances
         */
        public function setPerformances($performances)
        {
            $this->performances = $performances;
        }

        /**
         * @return mixed
         */
        public function getPerformances()
        {
            return $this->performances;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
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
        public function getKind()
        {
            return $this->kind;
        }

        /**
         * @return mixed
         */
        public function getCountry()
        {
            return $this->country;
        }

        /**
         * @return mixed
         */
        public function getPicture()
        {
            return $this->picture;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $contract
         */
        public function setContract($contract)
        {
            $this->contract = $contract;
        }

        /**
         * @return mixed
         */
        public function getContract()
        {
            return $this->contract;
        }



    }
?>