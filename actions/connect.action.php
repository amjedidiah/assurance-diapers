<?php
require("config.action.php");



if (strpos($baseURL, 'localhost')) {
    $srvr = "localhost";
    $pass = "amjedidiah";
    $usr = "root";
    $db = "assurancediapers";
} else {
    $srvr = "localhost:3306";
    $pass = "&3:8:8-$6048";
    $usr = "assuktem_amjedidiah";
    $db = "assuktem_assurancediapers";
}

$mysqli = new mysqli($srvr, $usr, $pass, $db);
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
    $mysqli->close();
}

