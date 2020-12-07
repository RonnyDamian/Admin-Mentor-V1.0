<title>Consulta empresarial | iDrCrop.</title>
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
                        <i class="far fa-chart-bar"></i>
                        Estadisticas Empresariales
                    </h3>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!--Inicio formulario registro usuarios -->
                    <div class="row mt-2 mb-4">
                        <div class="col-lg-4">
                            <label for="nombre"><strong>Parametro de busca</strong></label>
                            <select name="searchParam" id="searchParam" class="form-control  text-center" onchange="empresarial(this.value)">
                                <option value="" selected="selected" disabled="disabled">~~ Seleccione una opción ~~</option>
                                <?php
                                require_once ('../Model/Empresa.php');
                                $obj= new Empresa();

                                $data=$obj->mostrarEmpresa();

                                foreach ($data as $key ):
                                    ?>
                                    <option value="<?php echo $key['id_Empresa']?>"><?php echo $key['empresa'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div id="contenedor"> </div>
                         <div class="col-lg-12"> <a href="#" class=" btn btn-danger mb-4 float-right" id="report"><i class="fa fa-print">Generar Reporte</i></a> </div>                       
    </div>
</div>



<!--Fin página Clientes -->


<?php require_once ("footer.php")?>

<script>
    $('#searchParam').select2();
</script>
