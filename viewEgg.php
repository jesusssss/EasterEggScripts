<?php
include("_config.php");

$userId = pget("userId");
$eggId = pget("eggId");
$sql = "UPDATE eggLocations SET available = 2 WHERE toUser = '$userId' AND egg = '$eggId'";
$GLOBALS["db"]->query($sql);