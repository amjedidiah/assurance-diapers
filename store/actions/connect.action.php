<?php
    require("config.action.php");

    $srvr = 'localhost';
    $pass = "&3:8:8-$6048";

    if(strpos($baseURL, 'localhost')) {
        $srvr .= ':3308';
        $usr = "amjedidiah";
        $db = "assurance_diapers";
    } else {
        $usr = "borejwpf_amjedidiah";
        $db = "borejwpf_assurancediapers";
    }

    $mysqli = new mysqli($srvr, $usr, $pass, $db);
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno. ') '
                . $mysqli->connect_error);
        $mysqli->close();
    }
    
    
?>
