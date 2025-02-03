<?php 
    class Team{

        public $players;
        public function __construct() {
            $this->players = [];
        }
    
        public function addPlayer(Player $player) {
            $this->players[] = $player;
        }
    
        public function removePlayer(Player $player) {
            $key = array_search($player, $this->players, true);
            if ($key !== false) {
                unset($this->players[$key]);
            }
        }
    
        public function getPlayers() {
            return $this->players;
        }
    
        public function getNumberOfPlayers() {
            return count($this->players);
        }
    
        public function getTotalTeamSkill() {
            $totalSkill = 0;
            foreach ($this->players as $player) {
                $totalSkill += $player->getSkill();
            }
            return $totalSkill;
        }
        
        public function getTeam(){
            return implode('<br>', $this->players);
        }
    }

?>