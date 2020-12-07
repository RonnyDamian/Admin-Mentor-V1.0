

<?php require_once ("header.php"); ?>

<!-- Logout Modal-->

<div class="modal fade" id="obtenerEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            <div class="modal-header bg-warning text-light" >
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight:700">Formulario de Edición</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmEmpresau" onsubmit="return editarEmpresa();" method="post">
                    <div class="row mt-2 mb-4">
                        <div class="col">
                            <label for="nombre"><strong>Fecha de Registro</strong></label>
                            <input type="text" name="registrou" id="registrou" maxlength="10" minlength="10" required  class="form-control" readonly>
                        </div>
                        <div class="col">
                            <label for="nombre"><strong>Empresa</strong></label>
                            <input type="hidden" name="id_Empresa" id="id_Empresa" class="form-control">
                            <input type="text" name="empresau" id="empresau" maxlength="70" min="3" required class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="nombre"><strong>Email</strong></label>
                            <input type="email" name="emailu" id="emailu" maxlength="70" min="3" required  class="form-control" readonly>
                        </div>
                        <div class="col">
                            <label for="nombre"><strong>Giro de Negocio</strong></label>
                            <input type="text" name="negociou" id="negociou" maxlength="70" min="3" required  class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2 mb-4">
                        <div class="col">
                            <label for="nombre"><strong>Ubicación</strong></label>
                            <input type="text" name="ubicacionu" id="ubicacionu" maxlength="70" min="3" required  class="form-control">
                        </div>
                        <div class="col">
                            <label for="nombre"><strong>Número de Contacto</strong></label>
                            <input type="text" name="contactou" id="contactou" maxlength="10" minlength="10" required  class="form-control" onkeypress="return validaNumericos(event) ;">
                        </div>
                    </div>
                    <div class="row mt-2 mb-4">
                        <div class="col">
                            <label for="nombre"><strong>Clave de Registro</strong></label>
                            <input type="text" name="claveRegistrou" id="claveRegistrou" maxlength="50" minlength="2" required  class="form-control" >
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <button class="btn btn-warning float-right">
                                <i class="fa fa-save">
                                    Editar
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
                    <div  id="contenedor"></div>
            </div>
                <!--Fin formulario registro usuarios -->
            </div>
        </div>
    </div>
</div>

<?php  require_once ("footer.php")?>
