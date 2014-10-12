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
        
        <article class="art_report">
            <h3>Kmom02: Objektorienterad programmering i PHP</h3>
            <p>Detta kursmomentet tog ganska lång tid för mig att lösa. Det tog väldigt lång tid att gå igenom allt material och lösa uppgifterna. Jag hade tyvärr inte tid att göra båda uppgifterna som tänkt då redan första uppgiften med tärningarna tog oväntat mycket tid att få rätt på.
                Anledningen till att det tog så lång tid var dels slarv från min egna sida som försökte få klart den fort genom att bara bygga på den struktur som gjordes i guiden oophp20. Jag borde ha lagt om strukturen direkt så att den passade kraven bättre och det hade blvivit enklare för mig att implementera alla delar.
                Jag hade en hel del strul med att få rätt på "multiplayer" delen så att den fungerade som jag ville, och den blev väll sådär. Var många små fel, när ett fixades så uppstod genast ett par nya så jag blev aldrig helt nöjd. Den innehåller fortfarande några små buggar. Men grundfunktionaliteten är på plats i alla fall.
                Jag borde nog ha frågat efter hjälp tidigare, men envis som man är så tänkte jag att jag skulle "försöka lite till" istället. Eftersom jag hållt på en del med objektorienterad programmering så trode jag att det skulle vara betydligt enklare för mig att lösa uppgifterna.</p>
            <p>Som sagt så känner jag mig överlag ganska bekväm med att programmera objektorienterat. Men ändå jobbade jag mig igenom hela oophp20-guiden, eftersom jag tänkte att repetition inte skadar. Den tog myhcket längre tid för mig att göra än jag trodde, flesta små fel som jag hade berodde väll främst på php och att jag inte är så van vid det ännu.
                Annars känner jag att jag har hyftsat bra koll på att arbeta med objekt och klasser. 
            <p>Jag valde alltså att göra "tärningsspelet 100" uppgiften. Éftersom guiden tog lång tid för mig och jag kände att det inte skulle vara så svårt att göra om den lite för denna uppgiften. Jag började med att använda de klasser som man gjorde i guiden rakt av, och lägga till några medlemsvariabler. Och det var mycket enkelt att få grundkraven uppfyllda. 
                Men det blev väldigt "klyddigt" att använda endast de klasserna om man skulle kunna spela mot varandra, och spara poäng etc. Tillslut var min kod så fruktansvärt dåligt strukturerad så jag gjorde om flera delar, bl.a var min sidokontroller fylld med php kod. Så jag slängde in en ny klass (DiceGame) som tog hand om allting som hade med spelet att göra.
                Därmed räckte det med enadast ett fåtal metodandrop från sidokontrollern till DiceGame objektet istället, sedan kan all nödvändig information hämtas därifrån istället. Det blev även enklare att implementera multiplayer funktionalitet. Annars behöll jag klasserna DiceHand, DiceImage och Dice från guide-momentet.
                I konstruktorn för DiceGame anger man helt enkelt hur många spelare man är och hur många tärningar varje spelare ska ha. Sedan skapas en array med en ny tärning för varje spelare i DiceGame objektet.<p>
            <p>Tyvärr så hann jag inte ens börja på "Månadens babe" uppgiften. Jag försöker hålla det tempot som rekommenderas i kursplanen för att hinna med allt, och nu räckte helt enkelt tiden inte till.<p> 
            <p>Överlag var det ganska rejäla uppgifter i detta moment, och flera extrauppgifter. Vet inte om det var jag som var väldigt långsam men jag kunde omöjligt få tiden att räcka till allt. Känner att jag lagt ner mer tid på detta moment än några tidigare moment, och hade behövt betydligt mer för att göra extrauppgifterna också. 
                Om jag får tid över från kommande kursmoment kanske jag kan bygga på denna uppgiften ytterligare senare i kursen. Jag lärde mig mycket nytt i alla fall om hur man programmerar objektorienterat med PHP, och det kommer jag säkerligen ha mycket nytta av. 
                Hoppas att det blir lite mindre "övergångs-fas" i de kommande kursmomenten så att man kan hinna med allt.</p>
        </article>
        
    </div>
EOD;
    
    // include for rendering content
    include(THEME_PATH);
?>