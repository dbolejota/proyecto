<?php
 
    // Importamos las dependencias necesarias
    require_once('../model/conexion.php');
    require_once('../model/consultasAdmin.php');

    // Aterrizar los valores enviados desde el formulario
    // a través del name y el method POST

    $tipoDoc = $_POST['tipoDoc'];
    $identificacion = $_POST['numeroID'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    $estado = $_POST['estado'];
  

    // Validamos que todos los campos hayan sido registrados

    



            // Creamos el objeto a partir de la clase y enviamos las variables a registrar en la función

            $objetoConsultas = new consultasAdmin();
            $result = $objetoConsultas->actulizarUserAdmin($tipoDoc,$identificacion,$nombres,$apellidos,$telefono,$email,$rol,$estado);

?>