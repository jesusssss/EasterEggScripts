<?php
include("_config.php");

$userId = pget("id");
$sql = "SELECT friendId FROM friends WHERE userId = '$userId' AND status = 0";
$res = $GLOBALS["db"]->query($sql);

$result = array();

if($res->num_rows !== 0) {
    while($row = $res->fetch_assoc()) {
        $result[] = $row["friendId"];
    }
}

echo json_encode($result);
