<?php
    class DiceImage extends Dice {
        const FACES = 6;
        
        public function __construct (){
            parent::__construct(self::FACES);
        }
        
        /**
        * Get the rolls as a serie of images.
        *
        */
        public function getRollsAsImageList() {
            $html = "<ul class='dice'>";
            foreach($this->rolls as $val) {
                $html .= "<li class='dice-{$val}'></li>";
            }
            $html .= "</ul>";
            return $html;
        }
    }
?>