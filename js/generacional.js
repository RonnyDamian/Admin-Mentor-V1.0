function cambio(value){
    $.ajax({
        url:'../Controller/generacional.php',
        type:'POST',
        data:{searchParam:value},
        success:function (response) {
             $('#contenedor').html(response);
        }
    });
}