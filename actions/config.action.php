<?php
  $baseURL = $_SERVER['HTTP_HOST'] === "localhost" ? "http://localhost" : (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";  
  
  header("Access-Control-Allow-Origin: ".$baseURL);
  $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

  // Load Composer's autoloader
  // require 'vendor/autoload.php';
?>