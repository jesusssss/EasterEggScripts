<?php
include("_config.php");

$email = pget("email");

$sql = "SELECT * FROM users WHERE email = '$email'";
$res = $GLOBALS["db"]->query($sql);
if($res->num_rows !== 0) {
    while($row = $res->fetch_assoc()) {
        $result["username"]           = $row["username"];
        $result["password"] = $row["password"]; /* MD5 anti hash */
    }
} else {
    $result = "false";
}

echo json_encode($result);
