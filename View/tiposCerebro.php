<title>Tipos de Cerebro | iDrCrop.</title>
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
                        Estadisticas Tipos de Cerebro
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
                            <select name="searchParam" id="searchParam" class="form-control" onchange="typeMind(this.value)">
                                <option value="" selected="selected" disabled="disabled">~~ Seleccione una opción ~~</option>
                                <option value="1">Todos</option>
                                <option value="2">Por fecha</option>
                            </select>
                        </div>
                    </div>
                    <div  id="contenedor"></div>
                </div>
            </div>
        </div>
    </div>
</div>



<!--Fin página Clientes -->s


<?php require_once ("footer.php")?>










