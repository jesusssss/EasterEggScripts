<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

$GLOBALS["db"] = new mysqli('localhost', 'root', '1000koder', 'easteregg');

if($GLOBALS["db"]->connect_errno > 0) {
    die("Unable to connect to database [".$GLOBALS["db"]->connect_errno.']');
}

/** Get post **/
function pget($post) {
    if(isset($_POST[$post]) && !empty($_POST[$post])) {
        return $GLOBALS["db"]->real_escape_string($_POST[$post]);
    } else {
        return false;
    }
}