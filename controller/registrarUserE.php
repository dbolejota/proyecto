<?php
 
    // Importamos las dependencias necesarias
    require_once('../model/conexion.php');
    require_once('../model/consultasE.php');

    // Aterrizar los valores enviados desde el formulario
    // a través del name y el method POST

    $tipoDoc = $_POST['tipoDoc'];
    $identificacion = $_POST['numeroID'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $contrasenaB = $_POST['contrasenaB'];
    // Definimos valores por defecto
    $rol = "Cliente";
    $estado = "Activo";

    // Validamos que todos los campos hayan sido registrados

    if (strlen($tipoDoc)>0 && strlen($identificacion)>0 && strlen($nombres)>0 && strlen($apellidos)>0 && strlen($telefono)>0 && strlen($email)>0 && strlen($contrasena)>0 && strlen($contrasenaB)>0  ) {

        // Comparamos las claves
        if($contrasena == $contrasenaB){
            // Encriptar contraseña
            $claveMd = md5($contrasena);

            // Creamos el objeto a partir de la clase y enviamos las variables a registrar en la función

            $objetoConsultas = new consultasE();
            $result = $objetoConsultas->registrarUserE($identificacion, $tipoDoc, $nombres, $apellidos, $email, $telefono, $claveMd, $rol, $estado);

        }
        else{
            echo "<script>('LAS CONTRASEÑA NO COINCIDEN')</script>";
        echo '<script> location.href="../views/extras/registre.php" </script>';
        }
    }
    else{
        echo "<script>('POR FAVOR COMPLETE EL FORMULARIO')</script>";
        echo '<script> location.href="../views/extras/registre.php" </script>';
    }
    


?>