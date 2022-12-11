<?php
    require_once "../stripe-php-master/init.php";

    
    $secretKey ="sk_test_51LFWlnSHtIng2qTR9e45ZNTdHCzwpWPYRTDe8UGTir6acDS8dNnNAvnavbrbcA6dE2xk2Rz65GrthQQU06HA6Y8e00xZ1cisVS";
    $publishableKey ="pk_test_51LFWlnSHtIng2qTRrf8eqsedRA6yY7UlChSWkLfXCZ4au9ntZTLOnsriHb5U1j4g771TXyOoYusIbNeQUzzpQlUG00ceDzLnqC";
    

    \Stripe\Stripe::setApiKey($secretKey);
?>