<?php
     require_once("../model/conexion.php");
     require_once("../model/validarSesion.php");

     $objSesion = new validarSesion();
     $result = $objSesion->cerrarSesion();
?>