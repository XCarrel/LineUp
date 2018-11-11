<?php
    class Performances {
        private $datetime;
        private $duration;
        private $scene;

        public function __construct($datetime, $duration, $scene)
        {
            $this->datetime = $datetime;
            $this->duration = $duration;
            $this->scene = $scene;
        }

        /**
         * @return mixed
         */
        public function getDatetime()
        {
            return $this->datetime;
        }

        /**
         * @return mixed
         */
        public function getDuration()
        {
            return $this->duration;
        }

        /**
         * @return mixed
         */
        public function getScene()
        {
            return $this->scene;
        }


    }
?>