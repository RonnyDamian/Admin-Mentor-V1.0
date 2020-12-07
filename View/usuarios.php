<title>Registro de Usuarios</title>
<?php require_once("header.php")?>

<!--Inicia contenido de la página  registraUsuarios-->
<!-- Begin Page Content -->
<div class="container-fluid ">

    <div class="row ">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12  ">
            <div class="card shadow mb-4 ">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                    <h3 class="m-0 font-weight-bold text-primary ">Registro de Usuarios</h3>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>

                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!--Inicio formulario registro usuarios -->
                    <form id="frminsert"  onsubmit="return agregarUsuario()"  method="post">
                        <div class="row mt-2 mb-4">
                            <div class="col">
                                <label for="nombre"><strong>Nombres</strong></label>
                                <input type="text" class="form-control" name="nombre" id="nombre" minlength="3" maxlength="70" required="required"  >
                            </div>
                            <div class="col">
                                <label for="apellido"><strong>Apellidos</strong></label>
                                <input type="text" class="form-control" name="apellido" id="apellido" minlength="3" maxlength="70" required="required">
                            </div>
                            <div class="col">
                                <label for="cedula"><strong>Número de cédula</strong></label>
                                <input type="text" class="form-control" name="cedula" id="cedula" minlength="10" maxlength="10" required="required" onkeypress="return validaNumericos(event) ;">
                            </div>
                        </div>
                        <div class="row mt-2 mb-4">
                            <div class="col">
                                <label for="covencional"><strong>Número convencional</strong></label>
                                <input type="text" class="form-control" name="telefono" id="convencional" maxlength="10" minlength="7" placeholder="Ej: (043) 453-243" onkeypress="return validaNumericos(event) ;">
                            </div>
                            <di class="col">
                                <label for="celular"><strong>Número celular</strong></label>
                                <input type="text" class="form-control" name="celular" id=" celular" maxlength="10" minlength="10" placeholder="Ej: 0987654321" onkeypress="return validaNumericos(event) ;">
                            </di>
                            <div class="col">
                                <label for="direccion"><strong>Dirección domiciliaria</strong></label>
                                <input type="text" class="form-control" name="direccion" id="direccion" maxlength="100" min="3" required="required">
                            </div>
                        </div>
                        <div class="row mt-2 mb-4">
                            <div class="col">
                                <label for="email"><strong>Correo electrónico</strong></label>
                                <input type="email" class="form-control" name="email" id="email" minlength="7" maxlength="75" required="required" placeholder="ejemplo@gmail.com">
                            </div>
                            <div class="col">
                                <label for="usuario"><strong>Usuario</strong></label>
                                <input type="text" class="form-control" name="usuario" id="usuario" minlength="3" maxlength="75" required="required">
                            </div>
                            <div class="col">
                                <label for="clave"><strong>Clave</strong></label>
                                <input type="password" class="form-control" name="password" id="clave" required="required"  minlength="8" maxlength="15">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col ">
                                <a href="home.php" class="btn btn-danger float-right">
                                    <i class="fa fa-undo-alt"></i>
                                    Volver
                                </a>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success float-left" id="">
                                    <i class="far fa-save"></i>
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                    <!--Fin formulario registro usuarios -->

                </div>
            </div>
        </div>
    </div>


    <!--Finaliza contenido de la página registraUsuarios-->

<?php require_once("footer.php")?>