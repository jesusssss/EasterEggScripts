<?php
include("_config.php");

/* Expect nothing */
$result["success"] = false;

/* Validate */
if(pget("username") && pget("password")) {
    $username = pget("username");
    $password = pget("password");

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $res = $GLOBALS["db"]->query($sql);

    if($res->num_rows !== 0) {
        $result["success"] = true;
        $result["username"] = $username;
        $result["password"] = $password;
    }
}
echo json_encode($result);