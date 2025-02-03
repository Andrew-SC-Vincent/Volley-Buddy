<?php 
    class Player {
        private $playerID;
        private $name;
        private $passing;
        private $setting;
        private $serving;
        private $blocking;
        private $attacking;
        private $skill;

        //Constructor
        public function __construct($name, $passing, $setting, $serving, $blocking, $attacking, $skill = NULL, $playerID = NULL) {
            $this->playerID = $playerID;
            $this->name = $name;
            $this->passing = $passing;
            $this->setting = $setting;
            $this->serving = $serving;
            $this->blocking = $blocking;
            $this->attacking = $attacking;
            $this->skill = $skill;

            //Calculates skill
            $this->skill = $this->calculateSkill();
        }

        //Calculates
        public function calculateSkill() {
            $skill = $this->passing * (0.45) + $this->setting * (0.175) + $this->serving * (0.175) + $this->attacking * (0.10) + $this->blocking * (0.10);
            return number_format($skill, 1);
        }



        // Getters
        public function getPlayerID() {
            return $this->playerID;
        }

        public function getName() {
            return $this->name;
        }

        public function getPassing() {
            return $this->passing;
        }

        public function getSetting() {
            return $this->setting;
        }

        public function getServing() {
            return $this->serving;
        }

        public function getBlocking() {
            return $this->blocking;
        }

        public function getAttacking() {
            return $this->attacking;
        }

        public function getSkill() {
            return $this->skill;
        }

        // Setters
        public function setPlayerID($playerID) {
            $this->playerID = $playerID;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setPassing($passing) {
            $this->passing = $passing;
        }

        public function setSetting($setting) {
            $this->setting = $setting;
        }

        public function setServing($serving) {
            $this->serving = $serving;
        }

        public function setBlocking($blocking) {
            $this->blocking = $blocking;
        }

        public function setAttacking($attacking) {
            $this->attacking = $attacking;
        }

        public function __toString(){
            return $this->getName();
        }
    }
?>