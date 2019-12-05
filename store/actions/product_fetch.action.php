<?php
    
    require('connect.action.php');

    $query = $mysqli->query("SELECT * FROM PRODUCTS WHERE id='".$_GET['id']."'");
    
    print_r( json_encode($query->fetch_assoc()));
?>
