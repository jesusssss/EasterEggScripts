<?php
include("_config.php");

$userId = pget("userId");
$friendsIds = pget("friendsIds");
$gift = pget("gift");
$lat = pget("lat");
$lng = pget("lng");
$radius = pget("radius");
$date = new DateTime();

$sqlGift = "INSERT INTO eggGift ('data') VALUES ('$gift')";
$GLOABLS["db"]->query($sqlGift);
$giftId  = $GLOBALS["db"]->insert_id;

foreach($friendsIds as $friendId) {
    $sqlEgg = "INSERT INTO eggLocations (lat, lng, radius, byUser, toUser, egg) VALUES ('$lat','$lng','$radius','$userId','$friendId','$giftId')";
    $GLOBALS["db"]->query($sqlEgg);
}
