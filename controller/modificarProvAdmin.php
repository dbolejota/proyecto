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
    
  

    // Validamos que todos los campos hayan sido registrados

    



            // Creamos el objeto a partir de la clase y enviamos las variables a registrar en la función

            $objetoConsultas = new consultasAdmin();
            $result = $objetoConsultas->actulizarFotoProvAdmin($nit_empre,$nom_empre,$nom_prov,$tel_prov);

?>