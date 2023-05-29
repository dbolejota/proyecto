<?php
 
    // Importamos las dependencias necesarias
    require_once('../model/conexion.php');
    require_once('../model/consultasAdmin.php');

    // Aterrizar los valores enviados desde el formulario
    // a través del name y el method POST

    
    $nit_empre = $_POST['nit_empre'];
    // $foto = $_POST['fotoa'];

   // definir el peso limite y los formatos
    define('LIMITE',2000);
    define('ARREGLO', serialize(array('image/jpg', 'image/png', 'image/jpeg','image/gif')));
    $PERMITIDOS = unserialize(ARREGLO);


    if($_FILES['logo_empreA']['error']>0){
        echo "<script>alert('Archivo Dañado ')</script>";
        echo '<script> location.href="../views/admin/verProv.php" </script>';
    }
    else{
        if(in_array($_FILES['logo_empreA']['type'],$PERMITIDOS) && $_FILES['logo_empreA']['size']<=LIMITE * 1024) {

        $foto ="../upload/usuarios/".$_FILES ['logo_empreA']['name'];

        $resultado = move_uploaded_file($_FILES['logo_empreA']['tmp_name'],$foto);

        }else{
            echo "<script>alert('la imagen supera el peso del formato')</script>";
             echo '<script> location.href="../views/admin/verProv.php" </script>';

        }
    }

    $objetoConsultas = new consultasAdmin();
    $result = $objetoConsultas->actulizarFotoProvAdmin( $nit_empre,$logo_empreA);

?>