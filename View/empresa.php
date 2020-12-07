<title>Formulario Empresa | iDrCrop.</title>
<?php  require_once("header.php")?>

<!--Inicio página Clientes -->

<!--Inicia contenido de la página  registraUsuarios-->
<!-- Begin Page Content -->
<div class="container-fluid ">

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12  ">
            <div class="card shadow mb-4 ">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                    <h3 class="m-0 font-weight-bold text-primary">
                        <i class="far fa-edit"></i>
                        Formulario de Registro
                    </h3>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col">
                            <button class="btn btn-primary " data-toggle="modal" data-target="#addEmpresa">
                                <i class="fa fa-plus-circle">
                                    Agregar
                                </i>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive" >
                        <?php
                        require_once('../Model/Empresa.php');
                        $obj=new Empresa();
                        $datos=$obj->mostrarEmpresa();

                        $tabla='<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-center" style="color:#ffffff">
                    <tr>
                        <th>Empresa</th>
                        <th>Giro de Negocio</th>
                        <th>Clave de Pago</th>
                        <th>Ubicación</th>
                        <th>Email</th>
                        <th>Contacto</th>
                        <th>Fecha de Registro</th>                        
                        <th>Editar</th>
                        <th>Elimar</th>
                    </tr>
                    </thead>
                              <tbody>';
                        $datosTabla="";

                        foreach ($datos as $key => $value ){

                            $datosTabla=$datosTabla.'
                                <tr class="text-center">
                                    <td>'.$value['empresa'].'</td>
                                    <td>'.$value['giro'].'</td>
                                    <td>'.$value['claveRegistro'].'</td>
                                    <td>'.$value['ubicacion'].'</td>
                                    <td>'.$value['email'].'</td>
                                    <td>'.$value['contacto'].'</td>
                                    <td>'.$value['fechaRegistro'].'</td>                                                                                                                                             
                                 <td>
                                <button class="btn btn-warning btn-sm" onclick="obtenerEmpresa('.$value['id_Empresa'].')" data-toggle="modal" data-target="#obtenerEmpresa">
                                 <i class="fa fa-edit">
                                  Editar
                                  </i>
                                  </button>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="eliminarEmpresa('.$value['id_Empresa'].')">
                                <i class="fa fa-trash-alt"> 
                                Eliminar
                                </i>
                                </button>
                            </td>                                                                                                                                                
                                </tr>
';

                        }
                        echo $tabla.$datosTabla.'</tbody></table>';?>
                        <!--Fin Página listado usuarios-->
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!--Fin página Clientes -->
        <?php require_once('modalAdd.php') ?>
        <?php require_once('modalEditEmpresa.php')?>
        <?php require_once ("footer.php")?>










