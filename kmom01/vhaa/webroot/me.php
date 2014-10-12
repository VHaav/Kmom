<?php
    include(__DIR__ . '/config.php');
    
    $vhaa['title'] = "Me-sida";
        
    $vhaa['main'] = <<<EOD
    <article>
        <h3>Om mig</h3>
        <figure id="figure_me">
            <img src="img/me.jpg" alt="Bild på Ville Haavisto" id="img_me" />
            <figcaption>
                <p>En bild på Ville.</p>
            </figcaption>
        </figure>
        <p>Hejsan, jag heter Ville Haavisto, är 24 år och bosatt i Malmö. 
            Jag har de senaste 3 åren studerat Systemutveckling på Malmö högskola och har nu bestämt mig 
            för att även utveckla mina kunskaper inom webbutveckling.</p>
        <p>På senare tid har jag programmerat en del, främst Java och Android applikationsutveckling, 
            men jag har även använt mig av Visualstudio och C# där jag först lärde mig att programmera för ett par år sedan. 
            Under sommaren har jag jobbat med att utveckla en Android applikation tillsammans med ett par kompisar och kommer 
            troligtvis fortsätta på detta spår en tid framöver, samtidigt som jag nu valt att läsa ett kurspaket på distans.</p>
        <p>Jag läser denna kursen som en del av ett kurspaket om webbutveckling. Detta är kurs nr 2 i paktetet, som handlar främst om PHP. 
            Den första kursen gav den grundläggande PHP (även HTML/CSS och SQLite) kunskap som behövdes för att nu gräva djupare i det som PHP har att erbjuda.</p>
    </article>
EOD;
    
    // include for rendering content
    include(THEME_PATH);
?>