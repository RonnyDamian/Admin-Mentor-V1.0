function agregarEmpresa(){

    $.ajax({
        url:'../Controller/addEmpresa.php',
        type:'POST',
        data:$('#frmEmpresa').serialize(),
        success:function (response){
            if(response==1){
                $("#frmEmpresa")[0].reset();
                setTimeout("location.href='../View/empresa.php' ", 1000);
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
                toastr["success"]("Empresa agregado exitosamente", "Guardado con éxito")
            }else if(response==2){
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
                toastr["warning"]("La empresa y/o el email ingresada ya existe", "Datos duplicados");
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
            toastr["error"]("Error al guardar rergistro", "Error de Registro");
        }

    }});
    return false;
}

function obtenerEmpresa(id_Empresa){
     $.ajax({
         url:'../Controller/obtenerEmpresa.php',
         type:'POST',
         data:{id_Empresa:id_Empresa},
         success:function (response) {
             response=JSON.parse(response);
             $('#empresau').val(response['empresa']);
             $('#negociou').val(response['giro']);
             $('#ubicacionu').val(response['ubicacion']);
             $('#emailu').val(response['email']);
             $('#contactou').val(response['contacto']);
             $('#registrou').val(response['fechaRegistro']);
             $('#claveRegistrou').val(response['claveRegistro']);
             $('#id_Empresa').val(response['id_Empresa']);
         }
     });
}
function editarEmpresa(){
    $.ajax({
        url:'../Controller/editEmpresa.php',
        type:'POST',
        data:$('#frmEmpresau').serialize(),
        success:function (response) {
            if(response==1){
                $("#frmEmpresau")[0].reset();
                setTimeout("location.href='../View/empresa.php' ", 3000);
                location.href
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
                toastr["success"]("Registro editado exitosamenre", "Editado con éxito")
            }else if(response==2){
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
                toastr["warning"]("La empresa y/o el email ingresada ya existe", "Datos duplicados");
            }else{
                location.href
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
                toastr["error"]("Error al editar registro", "Error de Actualizado", response)
            }
        }
    });
    return false;
}


function eliminarEmpresa(id_Empresa){
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
                url:"../Controller/eliminarEmpresa.php",
                data: "id_Empresa="+id_Empresa,
                success:function(r){
                    if(r){
                        setTimeout("location.href='../View/empresa.php'", 2500);
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
                        toastr["success"]("Registro eliminado exitosamente", "Registro eliminado")
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
                        toastr["error"]("Error al eliminar el registro", "Error de eliminación")
                    }
                }
            });
        }
    })
}