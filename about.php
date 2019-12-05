<?php

  include('config.php');

  $title = "About Us | Assurance Diapers";
  $content = "./views/about.view.php";
  $nav = "./views/jumbo.view.php";

   $site->displayHeaderAndFooter($content,$title,$nav);
?>