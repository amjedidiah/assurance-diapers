<?php

  include('config.php');

  $title = "Products | Assurance Diapers";
  $content = "./views/products.view.php";
  $nav = "./views/jumbo.view.php";

   $site->displayHeaderAndFooter($content,$title,$nav);
?>
