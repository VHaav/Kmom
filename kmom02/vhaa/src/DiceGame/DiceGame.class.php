<?php
    class DiceGame{
        public $dice;
        public $diceImagesHTML;
        public $nrOfRolls;
        public $nrOfDices;
        public $lastRollPoints;
        public $roundPoints;
        public $totalPoints;
        public $extraOutput;
        public $savedPoints;
        // for multiplayer
        public $players; // players represented by int 1,2,3...
        public $currentPlayer; // for each player, hold a new DiceHand object
        
        public function __construct($nrOfPlayers, $nrOfDices){
            $this->nrOfDices = $nrOfDices;
            $this->totalPoints = 0;
            $this->nrOfRolls = 0;
            $this->setCurrentPlayer();
            for($i = 0; $i < $nrOfPlayers; $i++){
                $this->players[$i+1] = new DiceHand($nrOfDices);
            }
        }
        
        private function setCurrentPlayer(){
            if(isset($_SESSION['currentDicePlayer'])){
                $this->currentPlayer = $_SESSION['currentDicePlayer'];
            }
            else{
                $this->currentPlayer = 1;
                $_SESSION['currentDicePlayer'] = 1;
            }
        }
        
        public function newRoll(){
            if(isset($_SESSION['dice100-'.$this->currentPlayer])){
                $this->players[$this->currentPlayer] = $_SESSION['dice100-'.$this->currentPlayer];
            }
            else{
                $this->players[$this->currentPlayer] = new DiceHand(1); // w 1 dice
            }
            $this->players[$this->currentPlayer]->rollAllDices();
             //update saved dice object after new roll
            $_SESSION['dice100-'.$this->currentPlayer] = $this->players[$this->currentPlayer];
            $this->diceImagesHTML = $this->players[$this->currentPlayer]->getRollsAsImageList();
            $this->lastRollPoints = $this->players[$this->currentPlayer]->getTotal();
            $this->nrOfRolls = $this->players[$this->currentPlayer]->getNrOfRolls();
            $this->savedPoints = (isset($_SESSION['savedpoints'.$this->currentPlayer])) ? $_SESSION['savedpoints'.$this->currentPlayer] : null;
            if($this->lastRollPoints != 1){
                $this->addRoundPoints();
            }
            else{
                $this->resetRoundPoints();
            }
        }
        
        private function addRoundPoints(){
            $this->roundPoints = $this->players[$this->currentPlayer]->getRoundTotal();
            $this->totalPoints = $this->roundPoints + $this->savedPoints;
            $this->extraOutput = <<<EOD
            <p>Denna runda har du fått {$this->roundPoints} poäng.</p> 
EOD;
        }
        private function resetRoundPoints(){
            $this->players[$this->currentPlayer]->resetRoundTotal();
            $this->totalPoints = $this->savedPoints;
            $this->extraOutput = <<<EOD
            <p>Ajdå, du fick en 1a, du förlorar denna rundans poäng!</p>
EOD;
            $this->switchPlayer();
        }
        
        public function savePoints(){
            if(isset($_SESSION['dice100-'.$this->currentPlayer])){
                $this->players[$this->currentPlayer] = $_SESSION['dice100-'.$this->currentPlayer];
                $_SESSION['savedpoints'.$this->currentPlayer] += $this->players[$this->currentPlayer]->getRoundTotal();
                $this->savedPoints = (isset($_SESSION['savedpoints'.$this->currentPlayer])) ? $_SESSION['savedpoints'.$this->currentPlayer] : null;
                $this->players[$this->currentPlayer]->resetRoundTotal();
                $this->totalPoints = $this->savedPoints;
                $this->nrOfRolls =  $this->players[$this->currentPlayer]->getNrOfRolls();
                $this->diceImagesHTML = $this->players[$this->currentPlayer]->getRollsAsImageList();
                $this->extraOutput = <<<EOD
                <p>Spelare {$this->currentPlayer} har sparat {$_SESSION['savedpoints'.$this->currentPlayer]} poäng!</p>
EOD;
                $this->switchPlayer();
            }
            else{
                $this->extraOutput = <<<EOD
                <p>Du måste starta spelet först!</p>
EOD;
            }
        }
        
        public function initNewGame(){
            for($i = 0; $i < count($this->players); $i++){
                $this->players[$i] = new DiceHand(1);
                $_SESSION['dice100-'.$i] = $this->players[$i];
                $_SESSION['savedpoints'.$i] = 0;
            }
            unset($_SESSION['currentDicePlayer']);
            $this->extraOutput = <<<EOD
            <p>Spelet startas om! Du har 0 poäng. Gör ett nytt kast!</p>
EOD;
        }
        
        private function switchPlayer(){
            if($this->currentPlayer < count($this->players)){ // currentPlayer has not reached the last player (or dice) in the list 
                $this->currentPlayer++; // inc current player
            }
            else{ // currentPlayer has reached the last player (or dice) in the list
                $this->currentPlayer = 1; // 1 will point to the first player (or dice) in the player array (EX. $this->players[$this->currentPlayer])
            }
            $_SESSION['currentDicePlayer'] = $this->currentPlayer;
        }
    }
?>