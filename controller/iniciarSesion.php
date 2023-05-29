<?php
    // Importamos la refencias necesarias 
    require_once('../model/conexion.php');
    require_once('../model/validarSesion.php');

    $email = $_POST['email'];
    $clave = md5($_POST['clave']);

    // Creamos un objeto de la clase validarSesion y enviamos los
    // argumentos a la funcion iniciar sesion
    $objetoSesion = new validarSesion();
    $result = $objetoSesion->iniciarSesion($email, $clave);


?>