<?php
    class Artist {
        public $id;
        public $name;
        public $description;
        public $kind;
        public $country;
        public $picture;
        public $performances;

        public function __construct($id, $name, $description, $kind, $country, $picture)
        {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->kind = $kind;
            $this->country = $country;
            $this->picture = $picture;
            $this->performances = $this->getPerformances();
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
    }
?>