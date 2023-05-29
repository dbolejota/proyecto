<?php
    require_once("../model/conexion.php");
    require_once("../model/consultasAdmin.php");

    $nit_empre = $_GET['nit_empre'];


    $objetoConsultas = new consultasAdmin();
    $result= $objetoConsultas->eliminarProv($nit_empre);


?>