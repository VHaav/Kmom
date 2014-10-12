<?php
    // start a named session
    session_name(preg_replace('/[^a-z\d]/i', '', __DIR__));
    session_start();
    /**
        Contains error reporting settings, constans, and other values (header, footer) that does not change between different pages
    */
    // set error reporting to "report all types of errors"
    error_reporting(-1);
    ini_set('display_ errors', -1); // display all errors
    ini_set('output_buffering', 0); // dont buffer outputs, write directly
    
    
    
    // constant paths
    define('ROOT_PATH', __DIR__ . '/..');
    define('THEME_PATH', ROOT_PATH . '/theme/render.php');
    
    // include bootstrap functions
    include(ROOT_PATH . '/src/bootstrap.php');
    // include class for navigation menu
    include(ROOT_PATH . '/src/Navigation.class.php');
    
    // init vhaa variable
    $vhaa = array();
    
    $vhaa['lang'] = "sv";
    $vhaa['title_append'] = " | vhaa webbtemplate";
    
    // theme related settings.
    $vhaa['stylesheet'] = 'css/style.css';
    //$vhaa['favicon']    = 'favicon.ico';
    
    // top menu
    $vhaa['topmenu'] = array(
        'items' => array(
            'home' => array('text' => 'Me', 'href' => 'me.php', 'title' => 'Min Me-sida'),
            'report' => array('text' => 'Redovisning', 'href' => 'report.php', 'title' => 'Redovisningar'),
            'source' => array('text' => 'Källkod', 'href' => 'source.php', 'title' => 'Se källkod')
        ),
        'callback_selected' => function($url) {
            if(basename($_SERVER['SCRIPT_FILENAME']) == $url){
                return true;
            }
        }
    );
    
    $vhaa['header'] = <<<EOD
    <h1>vhaa Webbtemplate</h1>
EOD;
    
    $vhaa['byline'] = <<<EOD
    <div><p class="fine_text">Detta är en exempelsida för vhaa webbtemplate. Jag som gjort denna hemsidan heter Ville Haavisto och har gjort denna sida som del av en webbutvecklingskurs på Blekinge tekniska högskola.
            Kursen är en fördjupning i PHP och objektorienterad programmering.</p></div>
EOD;
    
    $currentURL = getCurrentUrl();
    $vhaa['footer'] = <<<EOD
    <footer class='page_footer'>
        <p>Verktyg:
            <a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
            <a href="http://validator.w3.org/checklink?uri={$currentURL}">Links</a>
            <a href="http://validator.w3.org/i18n-checker/check?uri={$currentURL}">i18n</a>
            <a href="source.php">Källkod</a>
        </p>
    </footer>
EOD;
?>