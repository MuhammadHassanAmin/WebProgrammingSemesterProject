<?php 
  include 'includes/config.php';

  unset($_SESSION["email"]);
  unset($_SESSION["role"]);
  unset($_SESSION["uanme"]);

  echo 'You have logged out!';
  header('Refresh: 0; URL = index.php');
  
?>