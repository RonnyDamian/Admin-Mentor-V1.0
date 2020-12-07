function recuperaClave(){
 $.ajax({
  url:"../Controller/recuperaClave.php",
  type:"POST",
  data:$("#frmEmail").serialize(),
  success:function(response){
      if(response==1){
          window.location.href="../Controller/enviaCorreo.php";
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
        toastr["warning"]("El email ingresado no existe ", "No se encontraron coincidencias")
    }
  }
 });
   return false;
}


function restableceClave(){
    $.ajax({
        url:"../Controller/restableceClave.php",
        type:"POST",
        data:$("#frmEmail2").serialize(),
        success:function(response){
            if(response==1){
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
                toastr["success"]("Su contraseña ha sido restablecida de manera satisfactoria ", "Contraseña restablecida exitosamente")

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
                toastr["success"]("El sistema lo redireccionara en breve ", "Direccionando al inicio se sesión...")
                setTimeout("location.href='../index.php'", 3000);
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
                toastr["warning"]("El email ingresado no existe ", "No se encontraron coincidencias")
            }
        }
    });
    return false;
}