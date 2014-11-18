<?php
include("_config.php");

$userId = (int) pget("userId");
$username = pget("username");

$userSql = "SELECT id FROM users WHERE username = '$username'";
$friend = $GLOBALS["db"]->query($userSql);
if($friend->num_rows !== 0) {
    while($row = $friend->fetch_assoc()) {
        $friendId = (int) $row["id"];
    }
    $count = "SELECT * FROM friends WHERE userId = '$userId' AND friendId = '$friendId'";
    $resCount = $GLOBALS["db"]->query($count);

    if($resCount->num_rows == 0) {
        $sql = "INSERT INTO friends (userId, friendId, status) VALUES (?, ?, 2)";
        $sqlPrep = $GLOBALS["db"]->prepare($sql);
        $sqlPrep->bind_param("ss", $userId, $friendId);
        $sqlPrep->execute() or die($GLOBALS["db"]->error);
        $sqlTurn = "INSERT INTO friends (userId, friendId, status) VALUES (?,?,0)";
        $sqlTurnPrep = $GLOBALS["db"]->prepare($sqlTurn);
        $sqlTurnPrep->bind_param("ss", $friendId, $userId);
        $sqlTurnPrep->execute() or die($GLOBALS["db"]->error);
        echo "true";
    } else {
        echo "false";
    }
} else {
    echo "null";
}

