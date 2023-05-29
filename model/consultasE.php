<?php
    // Creamos la clase global para las consultas externas
    class consultasE{

        // Creamos la función con el mismo nombre y argumentos
        // que definimos en el controlador
        public function registrarUserE($identificacion, $tipoDoc, $nombres, $apellidos, $email, $telefono, $claveMd, $rol, $estado){

            // Conectamos con la clase conexion

            $objetoConexion = new conexion();
            $conexion = $objetoConexion->get_conexion();

            // Consulta de sql para registrar, tabla, campos y valores 
            $registrar = "INSERT INTO users (identificacion, tipoDoc, nombres, apellidos, email, telefono, claveMd, rol, estado) VALUES (:identificacion, :tipoDoc, :nombres, :apellidos, :email, :telefono, :claveMd, :rol, :estado)";
            $result = $conexion->prepare($registrar);

            $result->bindParam(':identificacion', $identificacion);
            $result->bindParam(':tipoDoc', $tipoDoc);
            $result->bindParam(':nombres', $nombres);
            $result->bindParam(':apellidos', $apellidos);
            $result->bindParam(':email', $email);
            $result->bindParam(':telefono', $telefono);
            $result->bindParam(':claveMd', $claveMd);
            $result->bindParam(':rol', $rol);
            $result->bindParam(':estado', $estado);

            $result->execute();

            echo "<script>alert('REGISTRO EXITOSO')</script>";
            echo '<script> location.href="../views/extras/login.php" </script>';


        }
    }

?>