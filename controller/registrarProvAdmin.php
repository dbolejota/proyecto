<?php
 
    // Importamos las dependencias necesarias
    require_once('../model/conexion.php');
    require_once('../model/consultasAdmin.php');


    // Aterrizar los valores enviados desde el formulario
    // a través del name y el method POST

    $nit_empre = $_POST['nit_empre'];
    $nom_empre = $_POST['nom_empre'];
    $nom_prov = $_POST['nom_prov'];
    $tel_prov = $_POST['tel_prov'];

    //   definir el peso limite y los formatos
    define('LIMITE',2000);
    define('ARREGLO', serialize(array('image/jpg', 'image/png', 'image/jpeg','image/gif')));
    $PERMITIDOS = unserialize(ARREGLO);

    if($_FILES['logo_empre']['error']>0){
        echo "<script>alert('Archivo Dañado ')</script>";
        echo '<script> location.href="../views/admin/registrarProveedores.php" </script>';
    }
    else{
        if(in_array($_FILES['logo_empre']['type'],$PERMITIDOS) && $_FILES['logo_empre']['size']<=LIMITE * 1024) {

        $logo_empre ="../upload/usuarios/".$_FILES ['logo_empre']['name'];

        $resultado = move_uploaded_file($_FILES['logo_empre']['tmp_name'],$logo_empre);

        }else{
            echo "<script>alert('la imagen supera el peso del formato')</script>";
            echo '<script> location.href="../views/admin/registrarProveedores.php" </script>';

        }
    }


     // Validamos que todos los campos hayan sido registrados

     if (strlen($nit_empre)>0 && strlen($nom_empre)>0 && strlen($nom_prov)>0 && strlen($tel_prov)>0) {

        

     // Creamos el objeto a partir de la clase y enviamos las variables a registrar en la función

        $objetoConsultas = new consultasAdmin();
        $result = $objetoConsultas->registrarProv($nit_empre,$nom_empre, $nom_prov,$tel_prov, $logo_empre);

  
}




?>