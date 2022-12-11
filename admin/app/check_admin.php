<?php 

session_start();

if($_SESSION['user'] != 'A'){

    echo "
    <script>
    alert('you are not authorised to access this page!');
    window.location= './index.php';
    </script>
    ";
}

?>