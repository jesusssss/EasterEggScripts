<?php
include("_config.php");

$userId = pget("userId");
$friendId = pget("friendId");

$sql = "UPDATE friends SET status = 1 WHERE userId = '$userId' AND friendId = '$friendId'";
$GLOBALS["db"]->query($sql);
$sqlTurn = "UPDATE friends SET status = 1 WHERE userId = '$friendId' AND friendId = '$userId'";
$GLOBALS["db"]->query($sqlTurn);