<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="js/php.default.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
    <script type="text/javascript" src="js/preloader.js"></script>
    <script type="text/javascript" src="js/initialize.js"></script>
    <script type="text/javascript" src="js/databaseLoad.js"></script>
    <script type="text/javascript" src="js/databaseSave.js"></script>
    <script type="text/javascript">
        //add a DOM listener for the initialize function
        google.maps.event.addDomListener(window, 'load', initialize);
        google.maps.event.addDomListener(window, 'load', databaseLoad);
        google.maps.event.addDomListener(window, 'load', createAutocomplete);
    </script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
<?php include 'php/connect.php'?>
<div id="container">
    <div id="map_canvas">
    </div>
    <div id="search">
        <div id="search-contain">
            <input id="search-input" name="searcher" type="text"/>
        </div>
    </div>
    <div id="misc-container">
        <div id="misc-bar">
            Saved Locations: <?php echo $numItems;?>
            <form action="php/saveToDb.php" method="post">
                <input type="hidden" id="serialized" name="serialized"/>
                <input type="submit" value="Save" onclick="saveToDatabase();" />
            </form>
        </div>
    </div>
</div>
</body>
</html>
