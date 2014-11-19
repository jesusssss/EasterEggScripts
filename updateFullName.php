<?php
include("_config.php");

/* Validate */
if(pget("id") && pget("firstname")) {
    $id = pget("id");
    $firstname = pget("firstname");

    $sql = "UPDATE userInfo SET firstname = '$firstname' WHERE userId = '$id'";
    $GLOBALS["db"]->query($sql);
}