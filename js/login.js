$('#formLogin').submit(function(e){
    e.preventDefault();
    var usuario = $.trim($("#exampleInputEmail").val());
    var password =$.trim($("#exampleInputPassword").val());

    if(usuario.length == "" || password == ""){
        Swal.fire({
            type:'warning',
            title:'Debe ingresar un usuario y/o password',
        });
        return false;
    }else{
        $.ajax({
            url:"Controller/login.php",
            type:"POST",
            datatype: "json",
            data: {usuario:usuario, password:password},
            success:function(data){
                if(data == "null"){
                    Swal.fire({
                        type:'error',
                        title:'Usuario y/o password incorrecta',
                    });
                }else{
                    Swal.fire({
                        type:'success',
                        title:'¡Conexión exitosa!',
                        confirmButtonColor:'#3085d6',
                        confirmButtonText:'Ingresar'
                    }).then((result) => {
                        if(result.value){
                            //window.location.href = "vistas/pag_inicio.php";
                            window.location.href = "View/home.php";
                        }
                    })

                }
            }
        });
    }
});