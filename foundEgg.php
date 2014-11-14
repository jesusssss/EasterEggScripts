<?php
include("_config.php");

/* Validate */
if(pget("userId") && pget("eggId")) {
    $userId = pget("userId");
    $eggId = pget("eggId");

    $sql = "UPDATE eggLocations SET available = 1 WHERE toUser = '$userId' AND egg = '$eggId'";
    $GLOBALS["db"]->query($sql);
}