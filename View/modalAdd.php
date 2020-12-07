

<?php require_once ("header.php"); ?>

<!-- Logout Modal-->

<div class="modal fade" id="addEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            <div class="modal-header bg-success text-light" >
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700">Formulario de Registro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmEmpresa" onsubmit="return agregarEmpresa();" method="post">
                    <div class="row mt-2 mb-4">
                        <div class="col">
                            <label for="nombre"><strong>Empresa</strong></label>
                            <input type="text" name="empresa" id="empresa" maxlength="70" min="3" required class="form-control">
                        </div>
                        <div class="col">
                            <label for="nombre"><strong>Giro de Negocio</strong></label>
                            <input type="text" name="negocio" id="negocio" maxlength="70" min="3" required  class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="nombre"><strong>Ubicación</strong></label>
                            <input type="text" name="ubicacion" id="ubicacion" maxlength="70" min="3" required  class="form-control">
                        </div>
                        <div class="col">
                            <label for="nombre"><strong>Email</strong></label>
                            <input type="email" name="email" id="email" maxlength="70" min="3" required  class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2 mb-4">
                        <div class="col">
                            <label for="nombre"><strong>Número de Contacto</strong></label>
                            <input type="text" name="contacto" id="contacto" maxlength="10" minlength="10" required  class="form-control" onkeypress="return validaNumericos(event) ;">
                        </div>
                        <div class="col">
                            <label for="nombre"><strong>Clave de Registro</strong></label>
                            <input type="text" name="claveRegistro" id="claveRegistro" maxlength="50" minlength="2" required  class="form-control" >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <button class="btn btn-success float-right" >
                                <i class="fa fa-save">
                                    Guardar
                                </i>
                            </button>
                        </div>
                        <div class="col">
                            <button class="btn btn-danger  float-left" data-dismiss="modal">
                                <i class="fa fa-times" >
                                    Cancelar
                                </i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
                <!--Fin formulario registro usuarios -->
            </div>
        </div>
    </div>
</div>

<?php  require_once ("footer.php")?>
