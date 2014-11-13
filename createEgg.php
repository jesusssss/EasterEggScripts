<?php
include("_config.php");

$userId = pget("userId");
$uId = intval($userId);
$friendIds = $_POST["friendIds"];
$gift = pget("gift");
$lat = pget("lat");
$lng = pget("lng");
$radius = pget("radius");
$null = NULL;
$date = new DateTime();


$sqlGift = "INSERT INTO eggGift (gift) VALUES ('$gift')";
$GLOBALS["db"]->query($sqlGift);
$giftId  = $GLOBALS["db"]->insert_id;

$query = "INSERT INTO eggLocations (lat, lng, radius, available, byUser, toUser, egg) VALUES(?, ?, ?, ?, ?, ? ,?)";

$conn = $GLOBALS["db"]->prepare($query);

foreach ($friendIds as $id) {
    $conn->bind_param("sssssss", $lat, $lng, $radius, $null, $userId, $id, $giftId);
    $conn->execute();
}