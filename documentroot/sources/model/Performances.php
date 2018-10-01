<?php
    class Performances {
        public $datetime;
        public $duration;
        public $scene;

        public function __construct($datetime, $duration, $scene)
        {
            $this->datetime = $datetime;
            $this->duration = $duration;
            $this->scene = $scene;
        }
    }
?>