<?php
   session_start();
   unset($_SESSION['valid']);
   unset($_SESSION['email']);
   unset($_SESSION['id']);
   session_destroy();
   
   header('location: ../index.php');
?>