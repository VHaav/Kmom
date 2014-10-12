<!doctype html>
<html lang='<?=$lang?>'>
    <head>
        <meta charset="utf-8" />
        <title><?=getTitle($title)?></title>
        <link rel="stylesheet" type="text/css" href="<?=$stylesheet?>" />
        <link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="divBodyContent">
            <div id="header">
                <?=$header?>
            </div>
            <?php echo Navigation::generateMenu($topmenu); ?>
            <?php if(isset($vhaa['aside_left'])) echo $vhaa['aside_left']; ?>
            <div id="main">            
                <?=$main?>
            </div>
            <div id="byline">
                <?=$byline?>
            </div>
            <div id="footer">
                <?=$footer?>
            </div>
        </div>
    </body>
</html>