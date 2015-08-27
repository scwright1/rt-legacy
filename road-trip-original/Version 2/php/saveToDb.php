<?php
include "../connect.php";
if($db) {
    $array = array();
    $tmp = $_POST['serialized'];
    $tmp = str_replace("\\", "", $tmp);
    $array = unserialize($tmp);
    $query = "INSERT INTO `locations`(`location_name`, `latitude`, `longitude`, `uid`) VALUES";
    for($i=0, $c = count($array); $i < $c; $i++) {
        $fullString = $array[$i];
        $loc = substr($fullString, 0, strpos($fullString, "#"));
        $latlong = substr($fullString, (strpos($fullString, "#") + 1), strpos($fullString, ")"));
        $sepPos = strpos($latlong, ",");
        $lat = substr($latlong, 1, ($sepPos - 1));
        $endBracketPos = strpos($latlong, "@");
        $long = substr($latlong, ($sepPos + 2), $endBracketPos);
        $atPos = strpos($fullString, "@");
        $uid = substr($fullString, ($atPos+1), 1);
        $long = str_replace(")@", "", $long);
    
    
    
        $query .="('{$loc}','{$lat}','{$long}','{$uid}'";
    
        if($i < $c - 1) {
            $query .= ",";
        }
    }
    $result = $db->prepare($query);
    $result->execute();
}
$db = null;
header("Location: ../index.php");
exit;
?>
