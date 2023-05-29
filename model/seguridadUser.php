<?php

    session_start();

    if(!isset($_SESSION['autenticado'])){
        echo "<script>alert('POR FAVOR INICIE SESIÓN')</script>";
        echo '<script> location.href="../extras/login.php" </script>';
    }
    if($_SESSION['rol']!="Cliente"){
        echo "<script>alert('Su cuenta no posee permisos para acceder a esta interfaz')</script>";
        echo '<script> location.href="../extras/login.php" </script>';
    }
    

    
?>