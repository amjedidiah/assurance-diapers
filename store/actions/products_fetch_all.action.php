<?php 
    require('connect.action.php');
    echo $mysqli->query("SELECT * FROM PRODUCTS")->num_rows;
?>