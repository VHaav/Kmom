<?php

    $vhaa['title'] = "Tärningsspel";
    $vhaa['stylesheet'] = 'css/dices.css';
    
    $output = "";
    $nrOfRolls = (isset($_GET['rolls'])) ? $_GET['rolls'] : null;
    if(isset($nrOfRolls)){
        $dice = new DiceImage();            
        $histogram = new Histogram();
        $dice->rollTheDices($nrOfRolls);
        $diceValues = $dice->getRolls();
        $stringRollValues = "";
        foreach($diceValues as $value){
            $stringRollValues .= "$value<br>";
        }
        $diceImagesHTML = $dice->getRollsAsImageList();
        $tabelHTML = $histogram->getHistogramIncludeEmpty($dice->getRolls());
        $rollsTotal = $dice->getRollsSum();
        $rollAvgValue = $dice->getAverageValue();
        
        $output = <<<EOD
            <p>Nedan kan du se värden som du fick på {$nrOfRolls} kast: </p>
            <p>{$stringRollValues}</p>
            <p>{$diceImagesHTML}</p>
            <p>Tabell över hur många gånger varje värde förekom: </p>
            <p>$tabelHTML</p>
            <p>Totalt fick du {$rollsTotal} poäng!</p>    
            <p>Medelvärdet per kast är: {$rollAvgValue}</p>
EOD;
    }
    
    $diceHandOutput = "";
    if(isset($_GET['roll'])){
        $diceHand = new DiceHand();
        $diceHand->rollAllDices();
        $diceImagesHTML = $diceHand->getRollsAsImageList();
        $totalHand = $diceHand->getTotal();
        $diceHandOutput = <<<EOD
        <div>{$diceImagesHTML}</div><br>
        <p>Totalt fick du {$totalHand} poäng!</p>
EOD;
    }
    
    $output21 = "";
    if(isset($_GET['newroll'])){
        if(!isset($_SESSION['dice21'])){
            $dice21 = new DiceHand(2);
        }
        else{
            $dice21 = $_SESSION['dice21'];
        }
        $dice21->rollAllDices();
        $diceImagesHTML = $dice21->getRollsAsImageList();
        $_SESSION['dice21'] = $dice21; // store object to keep track on total score for all rounds
        $totalHand = $dice21->getTotal();
        $roundTotal = $dice21->getAllRollsTotal();
        $output21 = <<<EOD
        <div>{$diceImagesHTML}</div><br>
        <p>Du fick {$totalHand} poäng denna runda.</p>
        <p>Totalt har du nu {$roundTotal} poäng, försök komma så nära 21 som möjligt!</p>
EOD;
    }
    else if(isset($_GET['destroy'])){
        destroySession();
        $output21 = <<<EOD
        <p>Sessionen förstördes!</p>
EOD;
    }
    else if(isset($_GET['init'])){// ny omgång
        $dice21 = new DiceHand(2);
        $_SESSION['dice21'] = $dice21;
        $output21 = <<<EOD
        <p>Ny omgång! Du har 0 poäng. Gör ett nytt kast!</p>
EOD;
    }
    
    // this will be displayed for the user (see theme/..)
    $vhaa['main'] = <<<EOD
    <article>
        <h3>Tärningsspel</h3>
        <p>Här kan du spela ett enkelt tärningsspel som är utvecklat efter objektorienterade principer.</p>
        <p>Välj hur många gånger du vill kasta tärningen: <a href="?dicegames&amp;rolls=6">6 kast</a>, <a href="?dicegames&amp;rolls=9">9 kast</a>, <a href="?dicegames&amp;rolls=12">12 kast</a></p>
        <div>{$output}</div>
    </article>
    <article>
        <h3>DiceHand-spel</h3>
        <p>En annan variant på tärningsspel, med en klass (DiceHand) som innehåller flera tärningar (Dice klass instanser), där alla tärningar kastas samtidigt.</p>
        <p>Kasta dina tärningar: <a href="?dicegames&amp;roll">kasta.</a></p>
        <div>{$diceHandOutput}</div>
    </article>
    <article>
        <h3>Tärningsspel - 21</h3>
        <p>Ytterligare ett spel, försök komma så nära 21 som möjligt genom att kasta 2 tärningar.</p>
        <a href="?dicegames&amp;init">Starta ny runda</a><br>
        <a href="?dicegames&amp;newroll">Gör ett nytt kast</a><br>
        <a href="?dicegames&amp;destroy">Förstör sessionen</a><br><br>
        <div>{$output21}</div>
    </article>
EOD;

?>