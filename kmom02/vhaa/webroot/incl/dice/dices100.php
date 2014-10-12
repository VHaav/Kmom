<?php

    $vhaa['title'] = "Tärningsspel";
    $vhaa['stylesheet'] = 'css/dices.css';
    
    $multiPlayerOption = "";
    $multiPlayerStatus = "";
    $diceGame = null;
    if(isset($_GET['multiplayer'])){
        $multiPlayerStatus = "multiplayer=".$_GET['multiplayer']."&amp;";
        $dicegame = new DiceGame($_GET['multiplayer'], 1); // new game with 2 players and 1 dice each
    }
    else{
        $multiPlayerOption = "Spela <a href='?multiplayer=2'>2p</a><a href='?multiplayer=3'>, 3p</a><a href='?multiplayer=4'>, 4p</a>-multiplayer!";
        $dicegame = new DiceGame(1, 1); // new game with 1 player and 1 dice each
    }
    $output = "";
    
    if(isset($_GET['newroll'])){
        $dicegame->newRoll();
    }
    else if(isset($_GET['save'])){
        $dicegame->savePoints();
    }
    else if(isset($_GET['init'])){
        $dicegame->initNewGame();
    }
    
    $lastRoundPoints = (isset($_SESSION['savedpoints'.$dicegame->currentPlayer])) ? "<p style='max-width: 8em;'>- du har {$_SESSION['savedpoints'.$dicegame->currentPlayer]} poäng från föregående runda!</p>" : null;
    
    $output = <<<EOD
            <div>Senaste kast: {$dicegame->diceImagesHTML}</div><br>
            {$dicegame->extraOutput}
            <p>Totalt har du nu {$dicegame->totalPoints} poäng, försök komma så nära 100 som möjligt!</p>
            <p>Du har kastat totalt {$dicegame->nrOfRolls} kast.</p>            
EOD;
    
    // this will be displayed for the user (see theme/..)
    $vhaa['main'] = <<<EOD
    <div>
        <h3>Tärningsspelet100</h3>
        <p>Här kan du spela ett enkelt tärningsspel som är utvecklat efter objektorienterade principer.</p>
        <p>Det gäller att komma närmast 100 poäng, med oändligt antal kast, MEN slår du en 1:a förlorar du alla dina poäng för den aktuella rundan!</p>
        <p>$multiPlayerOption</p>
        <p><a href="?{$multiPlayerStatus}init">Starta ny runda</a></p>
        <div id="diceGameField">
            <div id="diceGameControllField">
                <h3>Spelare {$dicegame->currentPlayer}</h3>
                {$lastRoundPoints}
                <p><a href="?{$multiPlayerStatus}newroll">Kasta tärningen</a></p>
                <p><a href="?{$multiPlayerStatus}save">Spara poäng</a></p>
                <br>
                <br>
            </div>
            <div id="diceGameOutput">{$output}</div>
        </div>
    </div>
EOD;

?>