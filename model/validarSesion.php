<?php
    class validarSesion{

        public function iniciarSesion($email, $clave){

            // Enlazamos con la base de datos a partir de PDO
            $objetoConexion = new conexion();
            $conexion = $objetoConexion->get_conexion();

            // Consultamos el email en la base de datos
            $consultar = "SELECT * FROM users WHERE email=:email";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":email", $email);

            $result->execute();
            // Este if solo se cumplira si se encuentra un correo igual en la base de datos
            if ($f = $result->fetch()){
                // Comparamos la clave ingresa con la base de datos
                if($clave == $f['claveMd'] ){

                    // Comparamos el estado de la cuenta que debe estara activo
                    if($f['estado'] == "Activo"){

                        // Iniciamos sesión

                        session_start();
                        // Creamos variables de sesión para capturar la información d
                        // Del usuario que acaba iniciar sesión
                        $_SESSION['id'] =$f['identificacion'];
                        $_SESSION['email'] =$f['email'];
                        $_SESSION['rol'] =$f['rol'];
                        $_SESSION['estado'] =$f['estado'];
                        $_SESSION['clave'] =$f['claveMd'];

                        $_SESSION['autenticado'] = "SI";

                        if($f['rol']=="Administrador"){
                            echo "<script>alert('BIENVENIDO ADMINISTRADOR')</script>";
                            echo '<script> location.href="../views/admin/home.php" </script>';

                            
                        }
                        // VALIDAMOS EL ROL

                        if($f['rol']=="Cliente"){
                            echo "<script>alert('BIENVENIDO CLIENTE')</script>";
                            echo '<script> location.href="../views/cliente/home.php" </script>';

                            
                        }

                    }else{
                    echo "<script>alert('CUENTA INACTIVA, POR FAVOR CONTACTE AL ADMINISTRADOR')</script>";
                    echo '<script> location.href="../views/extras/login.php" </script>';
                    }

                }else{
                    echo "<script>alert('LA CONTRASEÑA ES INCORRECTA')</script>";
                    echo '<script> location.href="../views/extras/login.php" </script>';
                }

            }else{
            echo "<script>alert('EMAIL NO REGISTRADO EN EL SISTEMA, VERIFIQUE SUS DATOS ')</script>";
            echo '<script> location.href="../views/extras/login.php" </script>';
            }

        }

        public function cerrarSesion(){
            $objetoConexion = new conexion();
            $conexion = $objetoConexion->get_conexion();

            session_start();
            session_destroy();
            echo"<script> location.href='../index.html' </script>";

        }
    }

?>