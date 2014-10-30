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
        while($row = $res->fetch_assoc()) {
            $result["success"]  = true;
            $result["id"]       = $row["id"];
            $result["username"] = $row["username"];
            $result["password"] = $row["password"];
        }
    }
}
echo json_encode($result);