function comunicacion(value){
    $.ajax({
        url:'../Controller/comunicacion.php',
        type:'POST',
        data:{searchParam:value},
        success:function (response) {
            $("#contenedor").html(response);
        }
    });
}