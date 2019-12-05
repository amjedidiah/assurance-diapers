<?php
    
    require('connect.action.php');

    $row = [];
    $query = $mysqli->query("SELECT * FROM IMAGES WHERE product_id='".$_GET['id']."'");
    
    while($row = $query->fetch_assoc()) $res[] = $row;
    print_r( json_encode($res));
?>
