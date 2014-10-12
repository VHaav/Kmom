<?php
    /*
        A dice class, for playing around with dices
    */
    class Dice {
        
        private $dieValue; // used for testing DiceHand class which contains several instances of Dice (this)
        private $faces;
        protected $rolls = array();
        
        public function __construct($faces = 6){
            $this->faces = $faces;
        }
        
        public function __destruct() {
            
        }
        
        //used only for testing the DiceHand class
        public function rollDice(){
            $this->dieValue = rand(1, $this->faces);
            return $this;
        }
        
        public function rollTheDices($nrOfTimes){
            $this->rolls = array();
            
            for($i = 0; $i < $nrOfTimes; $i++){
                $val = rand(1, $this->faces);
                $this->rolls[$i] = $val;
            }
        }
        
        public function getDiceValue(){
            return $this->dieValue;
        }
        
        public function getRollsSum(){
            return array_sum($this->rolls);   
        }
        
        public function getAverageValue(){
            return round(array_sum($this->rolls) / count($this->rolls), 1);
        }
        
        public function getFaces(){
            return $this->faces;
        }
        
        public function getRolls(){
            return $this->rolls;
        }
    }
?>