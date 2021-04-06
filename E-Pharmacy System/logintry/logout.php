<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: ../new_client/login.php");
   }
?>