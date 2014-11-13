<?php
include("_config.php");

$eggId = pget("eggid");
$sql = "SELECT * FROM eggGift WHERE id = '$eggId'";
$res = $GLOBALS["db"]->query($sql);

$result = array();

if($res->num_rows !== 0) {
    while($row = $res->fetch_assoc()) {
        $result[] = array(
            "id" => $row["id"],
            "gift" => $row["gift"]
        );
    }
}

echo json_encode($result);
