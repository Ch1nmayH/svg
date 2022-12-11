<?php
session_start();
    include('config.php');
    $token = $_POST["stripeToken"];
    $token_card_type = $_POST["stripeTokenType"];
    
      header("Location:success.php");
    
?>