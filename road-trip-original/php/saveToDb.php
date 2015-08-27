<?php

include "connect.php";
$array = array();
$tmp = $_POST['serialized'];
$tmp = str_replace("\\", "", $tmp);
$array = unserialize($tmp);
$query = "INSERT INTO locations(location, lat, long, uid) VALUES";

for($i=0, $c = count($array); $i < $c; $i++) {

    $fullString = $array[$i];
    $loc = substr($fullString, 0, strpos($fullString, "#"));
    $latlong = substr($fullString, (strpos($fullString, "#") + 1), strpos($fullString, ")"));
    $sepPos = strpos($latlong, ",");
    $lat = substr($latlong, 1, ($sepPos - 1));
    $endBracketPos = strpos($latlong, "@");
    $long = substr($latlong, ($sepPos + 2), $endBracketPos);
    $long = str_replace(")@", "", $long);



    $query .="('{$loc}','{$lat}','{$long}','1')";

    if($i < $c - 1) {
        $query .= ",";
    }
}
echo $query;
$result = mysql_query($query, $connId);
?>
