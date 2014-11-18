<?php
include("_config.php");

$userId = pget("userid");
$friendId = pget("friendId");

$sql = "DELETE FROM friends WHERE userId = '$userId' AND friendId = '$friendId'";
$GLOBALS["db"]->query($sql);
$sqlTurn = "DELETE FROM friends WHERE userId = '$friendId' AND friendId = '$userId'";
$GLOBALS["db"]->query($sqlTurn);