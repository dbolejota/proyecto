<?php
    require_once("../model/conexion.php");
    require_once("../model/consultasAdmin.php");

    $id_user = $_GET['id_user'];


    $objetoConsultas = new consultasAdmin();
    $result= $objetoConsultas->eliminarUser($id_user);


?>