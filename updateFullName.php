<?php
include("_config.php");

/* Validate */
if(pget("id") && pget("firstname") && pget("lastname")) {
    $id = pget("id");
    $firstname = pget("firstname");
    $lastname = pget("lastname");

    $sql = "UPDATE userInfo SET firstname = '$firstname', lastname = '$lastname' WHERE userId = '$id'";
    $GLOBALS["db"]->query($sql);
}