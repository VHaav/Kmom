<?php
    class Navigation {
        public static function generateMenu($items){
            $result = "<nav id='topmenu'>";
            foreach($items['items'] as $item){
                $selected = null;
                if($items['callback_selected']($item['href'])){
                    $selected = "class='selected'";
                }
                $result .= "<a {$selected} href='{$item['href']}' >{$item['text']}</a>";
            }
            $result .= "</nav>";
            return $result;
        }
    }
?>