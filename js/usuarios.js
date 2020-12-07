/*function mostrar(){
    $.ajax({
        url:"../View/listaUsuarios.php",
        type:"POST",
        success:function (r) {
            $("#tablaUsuarios").html(r);
        }
    });
}*/

function limpiar(){
    $("#nombre").val("");
    $("#apellid0").val("");
    $("#cedula").val("");
    $("#telefono").val("");
    $("#celular").val("");
    $("#direccio").val("");
    $("#email").val("");
    $("#usuario").val("");
    $("#password").val("");
}
function agregarUsuario(){

    $.ajax({
        type:"POST",
        url:"../Controller/usuarios.php",
        data: $("#frminsert").serialize(),
        success:function(r){

            if(r==1){
                $("#frminsert")[0].reset();
                setTimeout("location.href='../View/home.php' ", 5600);
                toastr.options = {
                    "closeButton":true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr["success"]("Usuario agregado exitosamente", "Guardado con éxito")

            }else if (r==2){

                toastr.options = {
                    "closeButton":true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr["warning"]("El email y/o cédula introducido ya existe ", "Datos duplicados")

            }else if (r==3){
                toastr.options = {
                    "closeButton":true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr["warning"]("El número de cédula introducido no es válido", "Cédula incorrecta")

            }else{
                toastr.options = {
                    "closeButton":true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr["error"]("Hubo un error al registrar el usuario", "Error de regostro")
            }
        }
    });
    return false;
}
function obtenerUsuario(idUsuario){
    $.ajax({
        url:"../Controller/obtenerUsuario.php",
        type:"POST",
        data:"idUsuario=" +idUsuario,
        success:function (r) {
            r=JSON.parse(r);
            $("#nombreu").val(r['nombre']);
            $("#apellidou").val(r['apellido']);
            $("#cedulau").val(r['cedula']);
            $("#telefonou").val(r['telefono']);
            $("#celularu").val(r['celular']);
            $("#direccionu").val(r['direccion'])
            $("#emailu").val(r['email']);
            $("#idUsuario").val(r['idUsuario']);
        }
    });
}

 function editarUsuario(){
    $.ajax({
        url:"../Controller/editarUsuario.php",
        type:"POST",
        data:$("#frminsertu").serialize(),
        success:function (r) {
            if(r==1){
                setTimeout("location.href='../View/listaUsuarios.php'", 1900);
                toastr.options = {
                    "closeButton":true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": false,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "100",
                    "hideDuration": "500",
                    "timeOut": "2500",
                    "extendedTimeOut": "500",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr["success"]("Usuario actualizado exitosamente", "Actualizado con éxito")


            }else if (r==2){

                toastr.options = {
                    "closeButton":true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr["warning"]("El usuario y/o email ya existe ", "Datos duplicados")

            }else{
                toastr.options = {
                    "closeButton":true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr["error"]("Error al editar usuario", "Error de regostro")
            }

        }

    });
    return false;
}

function eliminarUsuario(idUsuario){

    Swal.fire({
        title: '¿Está seguro de eliminar este registro?',
        text: "Una vez eliminado ya no se podra recuperar!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Si, eliminelo!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type:"POST",
                url:"../Controller/eliminarUsuario.php",
                data: "idUsuario=" + idUsuario,
                success:function(r){
                    console.log(r);
                    if(r==1){
                        setTimeout("location.href='../View/listaUsuarios.php'", 1900);
                        toastr.options = {
                            "closeButton":true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": false,
                            "positionClass": "toast-top-center",
                            "preventDuplicates": true,
                            "onclick": null,
                            "showDuration": "100",
                            "hideDuration": "500",
                            "timeOut": "2500",
                            "extendedTimeOut": "500",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["success"]("Usuario eliminado exitosamente", "Registro eliminado")
                    }else{
                        toastr.options = {
                            "closeButton":true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-center",
                            "preventDuplicates": true,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["error"]("Error al eliminar el usuario", "Error de eliminación")
                    }
                }
            });
        }
    })
}


