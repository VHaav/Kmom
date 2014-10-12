<?php
    include(__DIR__ . '/config.php');
    
    $vhaa['title'] = "Redovisningar";
        
    $vhaa['main'] = <<<EOD
    <div class='main_content'>
        <h2>Redovisningar</h2>
        <p>Här finner du redovisningar från samtliga kursmoment som utfördes under denna kurs.</p>
        
        <article class="art_report">
            <h3>Kmom01: Kom igång med programmering i PHP</h3>
            <p>Detta första kursmoment tycker jag var mycket intressant och givande. Det tog oväntat lång tid att utföra då det var flera delar som man fick tänka till ordentligt på innan de blev rätt.
                den nya strukturen på alla filer som skulle implementeras var lite utmanande att få rätt på, men den känns definitivt väldigt effektiv och bra när det väl började fungera.
                Jag hade en del problem med att få rätt på navigations menyn och att markera den valda fliken. Den guiden som fanns tillgänglig gav visserligen ett svar, men jag använde mig inte av GET requests för att byta sida,
                vilket gav lite problem. Turligt nog märkte jag att källkoden till lärarens exempel gjorde på samma sätt, men det var inte helt enkelt för mig att förstå den koden från början. Men efter att ha studerat den ett tag 
                och testat mig fram så blev det tillslut rätt och jag känner att min lösning fungerar fint tillslut. Jag hade även ett problem med att starta session, den ville inte validera och klagade på att HEADER redan skickats och inte kan modifieras,
                jag vet sedan tidigare att sessionen måste startas före någon output sker. Jag stirrade mig blind på problemet tills jag hittade ett litet mellanslag längst upp i en fil före php-starttaggen, som orsakade felet.</p>                
            <p> Jag fortsätter med samma utvecklingsmiljö som rekommenderades i föregående kurs, nämnligen Firefox som webbläsare, jEdit som texteditor och FileZilla. Min dator kör Windows 8.1.</p>
            <p> Guiden php20 bläddrade jag igenom ganska snabbt då jag kände igen det från föregående kurs samt från den litteratur som jag läste (igen) för detta kursmoment. 
                Litteraturen läste jag redan i föregående kurs, men det var bra med lite repetition. Min webbmall döpte jag till "vhaa", i brist på några bättre idéer av bättre namn. Själva strukturen, som jag kopierade i stort sett rakt av från Anax, tycker jag känns mycket bra och effektiv.
                Det enda som jag kanske inte gillade var att det var rätt mycket som placerades i config.php filen, detta kommer jag nog ändra på och dela upp det lite mer. Det kändes självklart lite ovant och ibland kunde jag glömma vart jag lagt olika saker, eftersom man fortfarande är van vid en enklare struktur som användes i tidigare kurs.</p>
            <p> Tack vare guiden så hade jag inga svårigheter med att inkludera den uppdaterade source.php som en modul i min webbmall, och det ser ut att fungera som tänkt. Jag har ännu inte gjort extrauppgiften med github, eftersom allt annat tog längre tid att göra än planerat. Men jag planerar att göra uppgiften inom en snar framtid.</p>
        </article>
        
    </div>
EOD;
    
    // include for rendering content
    include(THEME_PATH);
?>