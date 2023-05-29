<?php
    // Creamos la clase global para las consultas externas
    class consultasAdmin{

        // USUARIOS

        // Creamos la función con el mismo nombre y argumentos
        // que definimos en el controlador
        public function registrarUser($identificacion, $tipoDoc, $nombres, $apellidos, $email, $telefono, $claveMd, $rol, $estado,$foto){

            // Conectamos con la clase conexion

            $objetoConexion = new conexion();
            $conexion = $objetoConexion->get_conexion();

            // Consulta de sql para registrar, tabla, campos y valores 
            $registrar = "INSERT INTO users (identificacion, tipoDoc, nombres, apellidos, email, telefono, claveMd, rol, estado,foto) VALUES (:identificacion, :tipoDoc, :nombres, :apellidos, :email, :telefono, :claveMd, :rol, :estado, :foto)";
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
            $result->bindParam(':foto', $foto);

            $result->execute();

            echo "<script>alert('REGISTRO EXITOSO')</script>";
            echo '<script> location.href="../views/admin/registrarUser.php" </script>';


        }

        public function mostrarUsers(){
            $f = null;
            $objetoConexion = new conexion();
            $conexion = $objetoConexion->get_conexion();

            $consultar = "SELECT * FROM users";
            $result = $conexion->prepare($consultar);
            $result->execute();


            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }

        public function eliminarUser($id_user){
            $objetoConexion = new conexion();
            $conexion = $objetoConexion->get_conexion();

            $eliminar = "DELETE FROM users WHERE identificacion=:id_user";
            $result = $conexion->prepare($eliminar);

            $result->bindParam('id_user', $id_user);

            $result->execute();

            echo "<script>alert('Usuario eliminado')</script>";
            echo '<script> location.href="../views/admin/verUser.php" </script>';


        }

        public function mostrarUserAdmin($id_user){
            $f = null;

            $objetoConexion = new conexion();
            $conexion = $objetoConexion->get_conexion();

            $buscar = "SELECT * FROM users WHERE identificacion=:id_user";
            $result = $conexion->prepare($buscar);

            $result->bindParam('id_user', $id_user);

            $result->execute();

            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;

            echo "<script>alert('Usuario Actualizado')</script>";
            echo '<script> location.href="../views/admin/verUser.php" </script>';


        }

        public function actulizarUserAdmin($tipoDoc,$identificacion,$nombres,$apellidos,$telefono,$email,$rol,$estado) {
          // Conectamos con la clase conexion

          $objetoConexion = new conexion();
          $conexion = $objetoConexion->get_conexion();

          $actualizar = "UPDATE users SET  tipoDoc=:tipoDoc, nombres=:nombres, apellidos=:apellidos, email=:email, telefono=:telefono, rol=:rol, estado=:estado WHERE identificacion=:identificacion";
          $result = $conexion->prepare($actualizar);

          $result->bindParam(':identificacion', $identificacion);
          $result->bindParam(':tipoDoc', $tipoDoc);
          $result->bindParam(':nombres', $nombres);
          $result->bindParam(':apellidos', $apellidos);
          $result->bindParam(':email', $email);
          $result->bindParam(':telefono', $telefono);
          $result->bindParam(':rol', $rol);
          $result->bindParam(':estado', $estado);
     

          $result->execute();
          
          echo "<script>alert('USUARIO ACTUALIZADO')</script>";
          echo '<script> location.href="../views/admin/verUser.php" </script>';

        }

        public function actulizarFotoUserAdmin( $identificacion, $foto) {
            // Conectamos con la clase conexion
  
            $objetoConexion = new conexion();
            $conexion = $objetoConexion->get_conexion();
  
            $actualizar = "UPDATE users SET  foto=:foto WHERE identificacion=:identificacion";
            $result = $conexion->prepare($actualizar);
  
            $result->bindParam(':identificacion', $identificacion);
            $result->bindParam(':foto', $foto);
       
  
            $result->execute();
            
            echo "<script>alert('FOTO DE USUARIO ACTUALIZADO')</script>";
           echo '<script> location.href="../views/admin/verUser.php" </script>';
  
          }

    
    // PROVEEDORES

    // Inicialización mostrar provedores
    public function registrarProv($nit_empre, $nom_empre, $nom_prov, $tel_prov, $logo_empre){

        // Conectamos con la clase conexion

        $objetoConexion = new conexion();
        $conexion = $objetoConexion->get_conexion();

        // Consulta de sql para registrar, tabla, campos y valores 
        $registrar = "INSERT INTO proveedores (nit_empre, nom_empre, nom_prov, tel_prov, logo_empre) VALUES (:nit_empre, :nom_empre, :nom_prov, :tel_prov, :logo_empre)";
        $result = $conexion->prepare($registrar);

        $result->bindParam(':nit_empre', $nit_empre);
        $result->bindParam(':nom_empre', $nom_empre);
        $result->bindParam(':nom_prov', $nom_prov);
        $result->bindParam(':tel_prov', $tel_prov);
        $result->bindParam(':logo_empre', $logo_empre);
        
     
        $result->execute();

        echo "<script>alert('REGISTRO EXITOSO')</script>";
        echo '<script> location.href="../views/admin/registrarProveedores.php" </script>';


        }

        public function mostrarProv(){
            $f = null;
            $objetoConexion = new conexion();
            $conexion = $objetoConexion->get_conexion();

            $consultar = "SELECT * FROM proveedores";
            $result = $conexion->prepare($consultar);
            $result->execute();


            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }

        public function eliminarProv($nit_empre){
            $objetoConexion = new conexion();
            $conexion = $objetoConexion->get_conexion();

            $eliminar = "DELETE FROM proveedores WHERE nit_empre=:nit_empre";
            $result = $conexion->prepare($eliminar);

            $result->bindParam('nit_empre', $nit_empre);

            $result->execute();

            echo "<script>alert('Proveedor eliminado')</script>";
            echo '<script> location.href="../views/admin/verProv.php" </script>';


        }



        public function mostrarProvAdmin($nit_empre){
            $f = null;

            $objetoConexion = new conexion();
            $conexion = $objetoConexion->get_conexion();

            $buscar = "SELECT * FROM proveedores WHERE nit_empre=:nit_empre";
            $result = $conexion->prepare($buscar);

            $result->bindParam('nit_empre', $nit_empre);

            $result->execute();

            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;

            echo "<script>alert('Usuario Actualizado')</script>";
            echo '<script> location.href="../views/admin/verProv.php" </script>';


        }


        public function actulizarProvAdmin($nit_empre,$nom_empre,$nom_prov,$tel_prov) {
            // Conectamos con la clase conexion
  
            $objetoConexion = new conexion();
            $conexion = $objetoConexion->get_conexion();
  
            $actualizar = "UPDATE proveedores SET  nom_empre=:nom_empre, nom_prov=:nom_prov, tel_prov=:tel_prov WHERE nit_empre=:nit_empre";
            $result = $conexion->prepare($actualizar);
  
            $result->bindParam(':nit_empre', $nit_empre);
            $result->bindParam(':nom_empre', $nom_empre);
            $result->bindParam(':nom_prov', $nom_prov);
            $result->bindParam(':tel_prov', $tel_prov);
            
            $result->execute();
            
            echo "<script>alert('PROVEEDOR ACTUALIZADO')</script>";
            echo '<script> location.href="../views/admin/verProv.php" </script>';
  
          }

        //   Actualizar logo empresa

        public function actulizarFotoProvAdmin( $nit_empre, $logo_empreA) {
            // Conectamos con la clase conexion
  
            $objetoConexion = new conexion();
            $conexion = $objetoConexion->get_conexion();
  
            $actualizar = "UPDATE proveedores SET  logo_empre=:logo_empre WHERE nit_empre=:nit_empre";
            $result = $conexion->prepare($actualizar);
  
            $result->bindParam(':nit_empre', $nit_empre);
            $result->bindParam(':logo_empre', $logo_empre);
       
  
            $result->execute();
            
            echo "<script>alert('LOGO EMPRESA ACTUALIZADO')</script>";
           echo '<script> location.href="../views/admin/verProv.php" </script>';
  
          }

        //   Ver perfil
        public function verPerfil($id){
            $f = null;

            $objetoConexion = new conexion();
            $conexion = $objetoConexion->get_conexion(); 

            $consultar = "SELECT * FROM users WHERE identificacion=:id";
            $result = $conexion->prepare($consultar);

            $result->bindParam(':id', $id);

            $result->execute();

            while ($resultado= $result->fetch()){
            $f [] = $resultado;

            }
            return $f;

        }


        
       


    
    }
 

?>