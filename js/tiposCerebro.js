function typeMind(valor){
    $.ajax({
        url:'../Controller/tiposCerebro.php',
        type:'POST',
        data:{searchParam:valor},
        success:function (response) {
            $("#contenedor").html(response);
        }
    });}