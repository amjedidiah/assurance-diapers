<?php 
    class user {
      public $public_path; 
      private $header;
      private $footer;
  
      public function __construct($header,$footer) {
        $this->header = $header;
        $this->footer = $footer;
      }
  
    }
  
  $session_cart = (isset($_SESSION['id'])) ? $_SESSION['cart'] : null; 
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Assurance Diapers | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="../favicon.ico" />

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css" />
    <link rel="stylesheet" href="style.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom/master.css">

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>

    <script type="text/javascript">
      let sessionCart=`<?php echo $session_value; ?>`;
    </script>

    <!-- Custom JS -->
    <script src="js/custom/master.js"></script>
    
  </head>
  <body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
      <div class="search-close">
        <i class="fa fa-close" aria-hidden="true"></i>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="search-content">
              <form action="#" method="get">
                <input
                  type="search"
                  name="search"
                  id="search"
                  placeholder="Type your keyword..."
                />
                <button type="submit">
                  <img src="img/core-img/search.png" alt="" />
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Search Wrapper Area End -->