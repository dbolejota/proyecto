<?php
    function cargarUsers(){
        $objetoConsultas = new consultasAdmin();
        $result = $objetoConsultas->mostrarUsers();

        if (!isset($result)) {
            echo '<h2>NO HAY USUARIOS REGISTRADOS</h2>';
        }else{
            foreach ($result as $f){
                
                echo '
                    
            <tr>
                <td><img src="../'.$f['foto'].'" width="100px"></td>
                <td>'.$f['identificacion'].'</td>
                <td>'.$f['nombres'].'</td>
                <td>'.$f['apellidos'].'</td>
                <td>'.$f['email'].'</td>
                <td>'.$f['telefono'].'</td>
                <td>'.$f['rol'].'</td>
                <td>'.$f['estado'].'</td>
                <td> <a href="modificarUser.php?id_user='.$f['identificacion'].'" class="btn btn-info"> <i class="ti-pencil-alt" ></i> </a> </td>
                <td> <a href="../../controller/eliminarUserAdmin.php?id_user='.$f['identificacion'].'" class="btn btn-danger"> <i class="ti-trash" ></i> </a> </td>
            </tr>
                
                ';
            }
        }
    }

    function cargarUser(){
    $id_user = $_GET['id_user'];

        $objConsultas = new consultasAdmin();
        $result = $objConsultas->mostrarUserAdmin($id_user);

        // Buscando la información del usuario

        // Colocar la información en el formulario
        foreach ($result as $f) {
            echo '
            <form action="../../controller/modificarUserAdmin.php" method="POST">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label>Tipo de documento</label>
                                                    <select name="tipoDoc" class="form-control" id="">
                                                        
                                                        <option value="'.$f['tipoDoc'].'">'.$f['tipoDoc'].'</option>
                                                        <option value="CC">CC</option>
                                                        <option value="CE">CE</option>
                                                        <option value="PASAPORTE">PASAPORTE</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Numero de documento</label>
                                                    <input type="number" readonly="readonly" value="'.$f['identificacion'].'" name="numeroID" class="form-control" placeholder="Ej:102356987">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Rol</label>
                                                    <select name="rol" class="form-control" id="">
                                                    <option value="'.$f['rol'].'">'.$f['rol'].'</option>
                                                        <option value="Administrador">Administrador</option>
                                                        <option value="Cliente">Cliente</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Estado</label>
                                                    <select name="estado" class="form-control" id="">
                                                    <option value="'.$f['estado'].'">'.$f['estado'].'</option>
                                                        <option value="Activo">Activo</option>
                                                        <option value="Inactivo">Inactivo</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Nombres</label>
                                                    <input type="text" value="'.$f['nombres'].'" name="nombres" class="form-control" placeholder="Luisa Fernanada">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Apellidos</label>
                                                    <input type="text" value="'.$f['apellidos'].'" name="apellidos" class="form-control" placeholder="Vega Zambrano">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Telefono</label>
                                                    <input type="number" value="'.$f['telefono'].'" name="telefono" class="form-control" placeholder="3154896325">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Email </label>
                                                    <input type="email" value="'.$f['email'].'" name="email" class="form-control" placeholder="@gmail.com">
                                                </div>

                                                


                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                            <a href="modificarFotoUser.php?id_user='.$f['identificacion'].'" class="btn btn-primary">Cambiar foto</a>
                                        </form>
            
            
            
            
            ';

        }


    }

    function perfil(){
        $id = $_SESSION['id'];
        $objConsultas = new consultasAdmin;

        $result = $objConsultas->verPerfil($id);

    foreach($result as $f){
    echo'

                    <div class="perfil">
                        <img src="../'.$f ['foto'].'" alt="" width="60px">
                        <div class="datos">
                            <h3>'.$f['nombres'].' '.$f['apellidos'].'</h3>
                            <p>'.$f['rol'].'</p>
                        </div>
                    </div>

    ';

        }

    }

    
?>