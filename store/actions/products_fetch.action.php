<?php
    
    require('connect.action.php');

    $get_array_keys = array_keys($_GET);
    $query_string = "SELECT * FROM PRODUCTS";
    $query_string_xtra = null;
    $res_array = array();
    $res = null;
    $price = null;
    $hover = null;

    for ($i=0; $i < count($_GET); $i++) { 
        $key = $get_array_keys[$i];

        if($_GET[$key] === 'undefined' || $_GET[$key] === 'null' || $_GET[$key] === null) {} 
        else {
            if($query_string_xtra === null) {
                $query_string_xtra .= " WHERE ";
            } else {
                if($key === "PRODUCT_COUNT") {
                } elseif ($key === 'PRODUCT_STEP') {
                    # code...
                }  else {
                    $query_string_xtra .= " AND ";
                }
            }
            
            
            if($key === 'PRODUCT_PRICE') {
                $prices = explode('AlphaEchoJalingo@6048', $_GET[$key]);
                $query_string_xtra .= "(".$key." BETWEEN ".$prices[0]." AND ".$prices[1].")";
            } elseif ($key === 'PRODUCT_CATEGORY') {
                $query_string_xtra .= $key." LIKE '%".$_GET[$key]."%'";
            } elseif ($key === 'PRODUCT_BRAND') {
                $brands = explode('AlphaEchoJalingo@6048', $_GET[$key]);
                
                if(count($brands) > 0 && $brands[0] !== '') $query_string_xtra .= "(".$key." = '".$brands[0]."'";
                
                if(count($brands) > 1) $query_string_xtra .= " OR ".$key." = '".$brands[1]."'";
                                
                if(count($brands) > 0) $query_string_xtra .= ")";
            } else {}
        }
    }

    $init_query = $mysqli->query($query_string.$query_string_xtra);
    $res_array[0] = $init_query->num_rows;

    $query_string = $query_string.$query_string_xtra.' ORDER BY PRODUCT_PRICE'.' LIMIT '.$_GET['PRODUCT_COUNT'].' OFFSET '.$_GET['PRODUCT_STEP'];
    $query = $mysqli->query($query_string);
    

    while($row = $query->fetch_assoc()) {
        $name = $row['PRODUCT_NAME'];
        $md5_name = hash('md5', $name);

        $res .= '<div class="col-12 col-sm-6 col-md-12 col-xl-6">
        <div class="single-product-wrapper">
            <!-- Product Image -->
            <div class="product-img">';

        $thumb_query = $mysqli->query("SELECT * FROM IMAGES WHERE PRODUCT_ID='$md5_name'");

        while($thumb_row = $thumb_query->fetch_assoc()) {
            if($thumb_row['IMAGE_NAME'] === '0') {
                $hover = '';
                $res .= '<img class="'.$hover.'" src="../img/products/'.$thumb_row['IMAGE_LOCATION_STRING'].'" alt="">';
            } elseif ($thumb_row['IMAGE_NAME'] === '1') {
                $hover = 'hover-img';
                $res .= '<img class="'.$hover.'" src="../img/products/'.$thumb_row['IMAGE_LOCATION_STRING'].'" alt="">';
            } else {}
            
        }
                
           $res .= '</div>

            <!-- Product Description -->
            <div class="product-description d-flex align-items-center justify-content-between">
                <!-- Product Meta Data -->
                <div class="product-meta-data">
                    <div class="line"></div>
                    <p class="product-price">&#8358;'.$row["PRODUCT_PRICE"].'</p>
                    <a href="product?id='.$row["ID"].'" data-product-id="'.$row["ID"].'">
                        <h6>'.$name.'</h6>
                    </a>
                </div>
                <!-- Ratings & Cart -->
                <div class="ratings-cart text-right">
                    <div class="ratings">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                    <div class="cart">
                        <img data-toggle="tooltip" data-placement="left" title="Add to Cart" onClick="populateCart(this)" src="img/core-img/cart.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>';
    }

    $res_array[1] = $res;
    
    echo json_encode($res_array);

?>