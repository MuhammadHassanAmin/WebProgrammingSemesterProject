<?php 
  include 'includes/config.php';

  unset($_SESSION["admin"]);
   
  echo 'You have logged out!';
  header('Refresh: 0; URL = index.php');
  
?>