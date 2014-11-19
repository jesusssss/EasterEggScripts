<?php
include("_config.php");

$userId = pget("userId");
$friendId = pget("friendId");

$sql = "DELETE FROM friends WHERE userId = '$userId' AND friendId = '$friendId'";
$GLOBALS["db"]->query($sql) or die($GLOBALS["db"]->error);
$sqlTurn = "DELETE FROM friends WHERE userId = '$friendId' AND friendId = '$userId'";
$GLOBALS["db"]->query($sqlTurn) or die($GLOBALS["db"]->error);