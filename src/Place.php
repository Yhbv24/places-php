<?php
    class Place
    {
        private $location;
        private $time;
        private $date;

        function __construct($location, $time, $date)
        {
            $this->location = $location;
            $this->time = $time;
            $this->date = $date;
        }

        function getLocation()
        {
            return $this->location;
        }

        // function setLocation($new_location)
        // {
        //     $this->location = (string) $new_location;
        // }
        function getTime(){
            return $this->time;
        }
        function getDate(){
            return $this->date;
        }

        function save()
        {
            array_push($_SESSION['places'], $this);
        }

        static function getAll()
        {
            return $_SESSION['places'];
        }

        static function deleteAll()
        {
            $_SESSION['places']=array();
        }
    }
 ?>
