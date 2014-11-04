<?php
include("_config.php");

$userId = pget("id");
$token = pget("hidden");

if($token != 'xmp3f89e') {
    /* If token is incorrect, die script */
    die();
}

$sql = "SELECT * FROM userInfo WHERE userId = '$userId'";
$res = $GLOBALS["db"]->query($sql);
$result = array();
if($res->num_rows !== 0) {
    while($row = $res->fetch_assoc()) {
        $result["profileImage"] = $row["profileImage"];
        $result["firstname"] = $row["firstname"];
        $result["lastname"] = $row["lastname"];
        $result["eggCount"] = $row["eggCount"];
    }
}

echo json_encode($result);
