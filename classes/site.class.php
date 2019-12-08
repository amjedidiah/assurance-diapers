<?php

  class site {
    public $public_path; 
    private $header;
    private $footer;
    private $toast;

    public function __construct($header,$footer, $toast) {
      $this->header = $header;
      $this->footer = $footer;
      $this->toast = $toast;
      $this->path = strpos($_SERVER['REQUEST_URI'], 'store') ? '../' : './';
      $this->connect = $this->path.'actions/connect.action.php';
      $this->createTables();
      $this->insertProductsAndImages();
    }

    //Create Products table
    private function createTables() {
      require($this->connect);

      $mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
      $mysqli->query("CREATE TABLE IF NOT EXISTS PRODUCTS (ID VARCHAR(255) PRIMARY KEY, 
                                                            PRODUCT_NAME VARCHAR(255) UNIQUE, 
                                                            PRODUCT_PRICE INT, 
                                                            PRODUCT_DESC VARCHAR(999), 
                                                            PRODUCT_QTY INT, 
                                                            PRODUCT_AVAILABILITY BOOLEAN AS (PRODUCT_QTY > 0),
                                                            PRODUCT_CATEGORY VARCHAR(255), 
                                                            PRODUCT_BRAND VARCHAR(255), 
                                                            PRODUCT_ADDED_DATE DATETIME
                                                          )");

      $mysqli->query("CREATE TABLE IF NOT EXISTS IMAGES (ID VARCHAR(255) PRIMARY KEY, 
                                            PRODUCT_ID VARCHAR(255), 
                                            IMAGE_NAME INT, 
                                            IMAGE_LOCATION_STRING VARCHAR(255),
                                            PRODUCT_THUMBNAIL BOOLEAN AS (IMAGE_NAME = 0)
                                          )");

      $mysqli->query("CREATE TABLE IF NOT EXISTS RATINGS (ID INT AUTO_INCREMENT PRIMARY KEY, 
                                                  USER VARCHAR(255), 
                                                  PRODUCT_ID VARCHAR(255), 
                                                  RATING INT
                                                      )");

      $mysqli->query("CREATE TABLE IF NOT EXISTS REVIEWS (ID INT AUTO_INCREMENT PRIMARY KEY, 
                                                  USER VARCHAR(255), 
                                                  PRODUCT_ID VARCHAR(255), 
                                                  REVIEW VARCHAR(999)
                                                )");

      $mysqli->query("CREATE TABLE IF NOT EXISTS ORDERS (ID INT PRIMARY KEY, 
                                            USER VARCHAR(255), 
                                            PRODUCT_ID VARCHAR(255),
                                            CHECKOUT_ID VARCHAR(255) AS (ID)
                                          )");
      $mysqli->commit();
      // $mysqli->close();
    }

    private function insertProductsAndImages() {
      require($this->connect);

      $products = json_decode(file_get_contents($this->path.'store/assets/products.json'));
      $images = scandir($this->path.'img/products');
      unset($images[0]);
      unset($images[1]);
      $images = array_values($images);
      
      $query_string = null;

      foreach ($products as $key => $value) {
        $id_product = hash('md5', $value->name);
        $name = $value->name;
        $price = $value->price;
        $desc = $mysqli->real_escape_string($value->desc);
        $qty = $value->qty;
        $category = $mysqli->real_escape_string(serialize($value->category)); 
        $brand = $value->brand;
        
        $query_string .= "INSERT INTO PRODUCTS ( 
            ID,
            PRODUCT_NAME, 
            PRODUCT_PRICE, 
            PRODUCT_DESC, 
            PRODUCT_QTY,
            PRODUCT_CATEGORY, 
            PRODUCT_BRAND)
          VALUES ('$id_product','$name', '$price', '$desc', '$qty', '$category', '$brand')
          ON DUPLICATE KEY UPDATE 
            ID = '$id_product',
            PRODUCT_NAME = '$name',
            PRODUCT_PRICE = '$price', 
            PRODUCT_DESC = '$desc', 
            PRODUCT_QTY = '$qty', 
            PRODUCT_CATEGORY = '$category', 
            PRODUCT_BRAND = '$brand';";

        
      }

      foreach ($images as $key => $value) {
        
        //IImages
        $id_image = hash('md5', $images[$key]);
        $image_location_string = $images[$key];
        $image_location_string_array = explode('_', $image_location_string);
        $image_name =  (int)str_replace(".png","",$image_location_string_array[count($image_location_string_array) - 1]);
        $id_product = hash('md5', ucwords($image_location_string_array[1]." ".$image_location_string_array[2]." ".$image_location_string_array[3]));


        $query_string .= "INSERT INTO IMAGES ( 
          ID,
          PRODUCT_ID, 
          IMAGE_NAME, 
          IMAGE_LOCATION_STRING)
        VALUES ('$id_image','$id_product', '$image_name', '$image_location_string')
        ON DUPLICATE KEY UPDATE 
          ID = '$id_image',
          PRODUCT_ID = '$id_product',
          IMAGE_NAME = '$image_name', 
          IMAGE_LOCATION_STRING = '$image_location_string';";
      }

      $mysqli->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

      $mysqli->multi_query($query_string);

      do{ 
          $mysqli->use_result(); 
      }while ($mysqli->next_result()); 


      if ($mysqli->errno) { 
        $mysqli->rollback();
      } else {
        $mysqli->commit();
      }
      
    }

    public function displayHeaderAndFooter($content,$title,$nav) {
      global $page;               //getting the page method in

      
      include $this->header;      //getting the page method in
      $nav === "" || $nav === null ? "" : include $nav;
      // $page->displayContent($content);
      include $content;
      strpos($_SERVER['REQUEST_URI'], '404') || strpos($_SERVER['REQUEST_URI'], 'login') || strpos($_SERVER['REQUEST_URI'], 'get-started') ? '' : include $this->footer;
      include $this->toast;
    }

  }

  

?>
