<?php
//db connection details
//username: wwMaps
$dbuser = 'roadtripmapsdb';
//password: wwMapper1
$dbpass = 'wwMapper1';
//hostname: 
$dbhost = 'roadtripmapsdb.db.3319142.hostedresource.com';
//database: 
$dbname = 'roadtripmapsdb';

$connId = mysql_connect($dbhost,$dbuser,$dbpass) or die ("Cannot connect to server");
$selectDb = mysql_select_db($dbname,$connId) or die ("cannot connect to the database");

$existingItems = mysql_query("SELECT id, location FROM locations");
$numItems = mysql_num_rows($existingItems);
?>

