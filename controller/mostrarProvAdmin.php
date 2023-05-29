<?php
    function cargarProv(){
        $objetoConsultas = new consultasAdmin();
        $result = $objetoConsultas->mostrarProv();

        if (!isset($result)) {
            echo '<h2>NO HAY PROVEEDORES REGISTRADOS</h2>';
        }else{
            foreach ($result as $f){
                
                echo '
                    
            <tr>
                <td><img src="../'.$f['logo_empre'].'" width="100px"></td>
                <td>'.$f['nit_empre'].'</td>
                <td>'.$f['nom_empre'].'</td>
                <td>'.$f['nom_prov'].'</td>
                <td>'.$f['tel_prov'].'</td>
                <td> <a href="modificarProveedores.php?nit_empre='.$f['nit_empre'].'" class="btn btn-info"> <i class="ti-pencil-alt" ></i> </a> </td>
                <td> <a href="../../controller/eliminarProvAdmin.php?nit_empre='.$f['nit_empre'].'" class="btn btn-danger"> <i class="ti-trash" ></i> </a> </td>
            </tr>
                
                ';
            }
        }
    }

    function cargarProve(){
    $nit_empre = $_GET['nit_empre'];
    
    
            $objConsultas = new consultasAdmin();
            $result = $objConsultas->mostrarProvAdmin($nit_empre);
    
            // Buscando la información del usuario
    
            // Colocar la información en el formulario
            foreach ($result as $f) {
                echo '

                <form action="../../controller/modificarProvAdmin.php" method="POST">
                                            <div class="row">

                                                <div class="form-group col-md-4">
                                                    <label>Nit empresa</label>
                                                    <input type="number" readonly="readonly" value="'.$f['nit_empre'].'" name="nit_empre" class="form-control" placeholder="">
                                                </div>


                                                <div class="form-group col-md-4">
                                                    <label>Nombre de empresa</label>
                                                    <input type="text" value="'.$f['nom_empre'].'" name="nom_empre" class="form-control" placeholder="">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Nombre proveedor</label>
                                                    <input type="text" value="'.$f['nom_prov'].'" name="nom_prov" class="form-control" placeholder="">
                                                </div>

                                              

                                                <div class="form-group col-md-4">
                                                    <label>Telefono</label>
                                                    <input type="number" value="'.$f['tel_prov'].'" name="tel_prov" class="form-control" placeholder="3154896325">
                                                </div>
                                            

                                                

                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">Actualizar</button>
                                            <a href="modificarFotoProv.php?nit_empre='.$f['nit_empre'].'" class="btn btn-primary">Cambiar foto</a>
                                        </form>
                
                
                ';
            }
    }


?>