function persistence(valor){
    $.ajax({
        url:'../Controller/persistencia.php',
        type:'POST',
        data:{searchParam:valor},
        success:function (response) {
            $("#contenedor").html(response);
        }
    });}