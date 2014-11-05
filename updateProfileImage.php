<?php
include("_config.php");

/* Validate */
if(pget("id") && pget("image")) {
    $id = pget("id");
    $image = pget("image");

    $sql = "UPDATE userInfo SET profileImage = '$image' WHERE userId = '$id'";
    $GLOBALS["db"]->query($sql);
}