<?php
    class DiceHand {
        
        private $dices;
        private $numOfDices;
        private $numOfRolls;
        private $sum;
        private $allRollsTotal; //used for "21", dice game
        private $roundTotal;
        
        public function __construct($numOfDices = 5){
            $this->numOfDices = $numOfDices;
            $this->allRollsTotal = 0;
            $this->roundTotal = 0;
            $this->numOfRolls = 0;
            $this->initDices();
        }
        
        //funkar ej? Ger error: undefined function. När den anropas från __construct()
        private function initDices(){
            for($i = 0; $i < $this->numOfDices; $i++){
                $this->dices[] = new DiceImage();
            }
        }
        
        public function rollAllDices(){
            $this->sum = 0;
            for($i = 0; $i < count($this->dices); $i++){
                $this->dices[$i]->rollDice();
                $this->sum += $this->dices[$i]->getDiceValue();
            }
            $this->allRollsTotal += $this->sum;
            $this->roundTotal += $this->sum; //reset on new round, or when user saves points (dice100)
            $this->numOfRolls++;
        }
        
        public function getTotal(){
            return $this->sum;
        }
        
        public function getAllRollsTotal(){
            return $this->allRollsTotal;
        }
        
        public function getNrOfRolls(){
            return $this->numOfRolls;
        }
        
        public function getRoundTotal(){
            return $this->roundTotal;
        }
        public function resetRoundTotal(){
            $this->roundTotal = 0;
        }
        
        public function getRollsAsImageList() {
            $html = "<ul class='dice'>";
            for($i = 0; $i < count($this->dices); $i++){
                $val = $this->dices[$i]->getDiceValue();
                $html .= "<li class='dice-{$val}'></li>";
            }
            $html .= "</ul>";
            return $html;
        }
    }
?>