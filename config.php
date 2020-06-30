<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  // header("Content-Type: application/xml; charset=utf-8");

  spl_autoload_register(function ($class) {
      include './classes/' . $class . '.class.php';
  });

  $site = new site('./inc/header.inc.php','./inc/footer.inc.php','./inc/toast.inc.php');
  $page = new page;

?>
