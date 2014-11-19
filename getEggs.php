<?php
include("_config.php");

$userId = pget("userid");
$sql = "SELECT * FROM eggLocations WHERE toUser = '$userId' AND available IS NULL ORDER BY id DESC";
$res = $GLOBALS["db"]->query($sql);

$result = array();

if($res->num_rows !== 0) {
    while($row = $res->fetch_assoc()) {
        $result[] = array(
          "id" => $row["id"],
            "lat" => $row["lat"],
            "lng" => $row["lng"],
            "radius" => $row["radius"],
            "eggId" => $row["egg"]
        );
    }
}

echo json_encode($result);
