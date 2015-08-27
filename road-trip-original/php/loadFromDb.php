<?php
include "connect.php";
$array = array();

$existingItems = mysql_query("SELECT id, location FROM locations", $connId);
while($locat = mysql_fetch_array($existingItems)) {
    $tmp['id'] = $locat['id'];
    $tmp['value'] = $locat['location'];
    //$tmp['value'] = str_replace("  ", " ", $tmp['value']);
    //hack for Oregon values because the state code is "OR", treats as || operator
    $tmp['value'] = str_replace(", OR,", ", Oregon,", $tmp['value']);
    array_push($array, $tmp);
} 
echo json_encode($array);
?>
