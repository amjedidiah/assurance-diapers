<?php

  include('config.php');

  $title = "Home | Assurance Diapers";
  $content = "./views/home.view.php";
  $nav = "./views/jumbo.view.php";

   $site->displayHeaderAndFooter($content,$title,$nav);
?>
