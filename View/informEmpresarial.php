<title>Informe Empresarial | iDrMind.</title>
<?php  require_once ("header.php")?>

<!--Inicio Página listado usuarios -->


<div class="container-fluid" >
    <div class="card shadow mb-4" >
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">
                <i class="far fa-file-text-o"></i>
                Informe Empresarial
            </h4>
        </div>
        <div class="card-body" id="tablaUsuarios">
            <div class="table-responsive" >

                <?php

                require_once "../Model/Notificaciones.php";

                $obj=new Notificaciones();
                $datos=$obj->mostrarNotificaciones();

                $tabla='<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-center" style="color:#ffffff">
                    <tr>
                        
                        <th>Fecha</th>
                        <th>tipo</th>   
                        <th>Descripción</th>                                                                                               
                        <th>Elimar</th>
                    </tr>
                    </thead>
                              <tbody>';
                $datosTabla="";

                foreach ($datos as $key => $value ){

                    $datosTabla=$datosTabla.'
  
                                <tr class="text-center">
                                    <td>'.$value['fecha'].'</td>
                                    <td>'.$value['tipo'].'</td>
                                    <td >'.$value['descripcion'].'</td>                                                                                                          
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="eliminarNotificacion('.$value['idNotificacion'].')">
                                <i class="fa fa-trash-alt"> 
                                Eliminar
                                </i>
                                </button>
                            </td>                                                                                                                                                
                                </tr>
';

                }


                echo $tabla.$datosTabla.'</tbody></table>';

                ?>
                <!--Fin Página listado usuarios-->
                <?php require_once ("modalNotificacion.php")?>

                <?php require_once("footer.php")?>



