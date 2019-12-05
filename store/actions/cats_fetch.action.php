<?php
    
    require('connect.action.php');

    $res = null;
    $price = null;

    $img_path = null;
    $id_array = null;
    $price_array = null;
    $price_index = null;
    
    foreach($categories as $key=>$value) {

        $query = $mysqli->query("SELECT * FROM PRODUCTS WHERE PRODUCT_CATEGORY LIKE '%${value}%'");
        if($query->num_rows > 0) {
            
            while ($row = $query->fetch_assoc()) {
                // $price = $price === null ? (int)$row['PRODUCT_PRICE'] : (int)$row['PRODUCT_PRICE']  < $price ? (int)$row['PRODUCT_PRICE'] : $price;
                $price_array[] = $row['PRODUCT_PRICE'];
                $price = min($price_array);
                $price_index = array_search($price,$price_array);
                $id_array[] = $row['ID'];
            }

            foreach ($id_array as $key => $val) {
                $image_query = $mysqli->query("SELECT * FROM IMAGES WHERE PRODUCT_ID ='$id_array[$price_index]' AND PRODUCT_THUMBNAIL=1");

                while($image_row = $image_query->fetch_assoc()) {
                    $img_path = $image_row['IMAGE_LOCATION_STRING'];
                }
            }
            
            $res .= '<div class="single-products-catagory clearfix">
                        <a href="./shop?cat='.$value.'">
                            <img src="../img/products/'.$img_path.'" alt="">
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <div class="line"></div>
                                <p>From &#8358;'.$price.'</p>
                                <h4>'.$value.'</h4>
                            </div>
                        </a>
                    </div>';
        }
    } 

    echo $res;

?>