<?php
  include("./actions/session.action.php");

  spl_autoload_register(function ($class) {
      include '../classes/' . $class . '.class.php';
  });  
  
  $site = new site('./inc/header.inc.php','./inc/footer.inc.php');
  $page = new page;

?>
