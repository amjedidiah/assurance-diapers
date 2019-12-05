<?php
    
    require('connect.action.php');

    $res = null;

    $min_query = $mysqli->query("SELECT MIN(PRODUCT_PRICE) AS minimum FROM PRODUCTS");
    $min = $min_query->fetch_assoc()['minimum'];

    $max_query = $mysqli->query("SELECT MAX(PRODUCT_PRICE) AS maximum FROM PRODUCTS");
    $max = $max_query->fetch_assoc()['maximum'];
     
    print_r(json_encode(['min' => $min, 'max' => $max]))

?>