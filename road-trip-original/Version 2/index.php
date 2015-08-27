<?php include("session-wrapper.php"); ?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Journee - Alpha Build 0.2.4.2</title>
        <link href="css/base.css" rel="stylesheet" type="text/css">
        <link href="css/custom-theme/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/php.default.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="js/global.js"></script>
        <script type="text/javascript" src="js/map-init.js"></script>
        <script type="text/javascript" src="js/initialise.js"></script>
        <script type="text/javascript" src="js/map-functions.js"></script>
        <script type="text/javascript" src="js/site-functions.js"></script>
        <script type="text/javascript" src="js/location-save.js"></script>
        <!-- Google Maps API -->
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
        <script type="text/javascript">
            //add a DOM listener for the initialize function
            google.maps.event.addDomListener(window, 'load', initialize);
            google.maps.event.addDomListener(window, 'load', createAutocomplete);
        </script>
    </head>
    <body>
    <?php
        $NAME = "Journee";
        $init_file = "config/init.conf";
    ?>
        <!-- include the standard admin bar on the page -->
        <?php include("admin-bar.php"); ?>
        <?php
                 if($_SESSION['id']):
        ?>
            <!-- ALL MAP RELATED STUFF GOES IN HERE.  THIS IS NOT VISIBLE TO THE END USER UNTIL AFTER LOG IN -->
            <div id="map-wrapper">
                <!-- map goes here -->
            </div>
            <!-- END OF MAP RELATED STUFF -->
        <?php
             endif;
        ?>
        <div id="page-wrapper">
            <?php
                 if($_SESSION['id']):
            ?>
                <script type="text/javascript"> 
                        $('#page-wrapper').slideUp('slow');
                        var searchBar = document.getElementById('searchInput');
                        searchBar.removeAttribute("disabled");
                </script>
                <!-- close button for panorama (streetview) mode -->
                <div id="panoramaClose"></div>
                <input type="hidden" id="serialized" name="serialized"/>
            <?php
                 else:
            ?>
                <?php include("login.php"); ?>
                <!-- this is the signup div -->
                <?php include("signup.php"); ?>
            <?php
                 endif;
            ?>
            <!-- if javascript is disabled, inform the user -->
            <noscript>
                <p style="font-size: 20px; color=red;">In order to use this system you must have Javascript Enabled.  Please enable Javascript (or add this domain to your exceptions) and then reload the page.</p>
            </noscript>
        </div>
        <!-- include the first-run php file for first run use -->
        <?php include("first-run.php"); ?>
    </body>
</html>


