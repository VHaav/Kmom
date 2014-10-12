<?php
    include(__DIR__ . '/config.php');
    $vhaa['title'] = "Dices";
    
    include('incl/dice/aside.php');
    
    //$vhaa['main'] is set in included php files
    if(isset($_GET['dicegames'])){
        include('incl/dice/test_dicegames.php');
    }
    else{
        include('incl/dice/dices100.php');
    }    
    // include for rendering content
    include(THEME_PATH);
?>