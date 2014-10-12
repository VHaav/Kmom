<?php
    class Histogram {
        
        public function __construct(){
            
        }
        
        public function __destruct() {
            
        }
        
        public function getHistogram(array $values){
            asort($values);
            $temp = array_count_values($values);
            $result = "";            
            foreach($temp as $key => $value){
                $marks = "";
                for($i = 0; $i < $value; $i++){
                    $marks .= "X";
                }
                $result .= $marks." ({$key})<br>";
            }
            return $result;            
        }
        
        public function getHistogramIncludeEmpty(array $values, $faces = 6){
            asort($values);
            $temp = array_count_values($values);
            $facesArray = range(1, $faces);
            $result = "";            
            for($c = 0; $c < count($facesArray); $c++){
                $result .= "{$facesArray[$c]}. ";
                if(array_key_exists($facesArray[$c], $temp)){
                    $value = $temp[$facesArray[$c]];
                    $marks = "";
                    for($i = 0; $i < $value; $i++){
                        $marks .= "X";
                    }
                    $result .= $marks . "<br>";
                }
                else{
                    $result .= "<br>";
                }
            }
            return $result;
        }
    }
?>