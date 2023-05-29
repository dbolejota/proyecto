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
    $contrasena = $_POST['numeroID'];
    $rol = $_POST['rol'];
    $estado = $_POST['estado'];
    
    

//   definir el peso limite y los formatos
    define('LIMITE',2000);
    define('ARREGLO', serialize(array('image/jpg', 'image/png', 'image/jpeg','image/gif')));
    $PERMITIDOS = unserialize(ARREGLO);

    if($_FILES['foto']['error']>0){
        echo "<script>alert('Archivo Dañado ')</script>";
        echo '<script> location.href="../views/admin/registrarUser.php" </script>';
    }
    else{
        if(in_array($_FILES['foto']['type'],$PERMITIDOS) && $_FILES['foto']['size']<=LIMITE * 1024) {

        $foto ="../upload/usuarios/".$_FILES ['foto']['name'];

        $resultado = move_uploaded_file($_FILES['foto']['tmp_name'],$foto);

        }else{
            echo "<script>alert('la imagen supera el peso del formato')</script>";
             echo '<script> location.href="../views/admin/registrarUser.php" </script>';

        }
    }



    // Validamos que todos los campos hayan sido registrados

    if (strlen($tipoDoc)>0 && strlen($identificacion)>0 && strlen($nombres)>0 && strlen($apellidos)>0 && strlen($telefono)>0 && strlen($email)>0 && strlen($contrasena)>0   ) {

        
            // Encriptar contraseña
            $claveMd = md5($contrasena);

            // Creamos el objeto a partir de la clase y enviamos las variables a registrar en la función

            $objetoConsultas = new consultasAdmin();
            $result = $objetoConsultas->registrarUser($identificacion, $tipoDoc, $nombres, $apellidos, $email, $telefono, $claveMd, $rol, $estado, $foto);

      
    }
    else{
        echo "<script>alert('POR FAVOR COMPLETE EL FORMULARIO')</script>";
        echo '<script> location.href="../views/admin/registrarUser.php" </script>';
    }
    


?>