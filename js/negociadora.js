function negociadora(valor){
    $.ajax({
        url:'../Controller/negociadora.php',
        type:'POST',
        data:{searchParam:valor},
        success:function (response) {
            $("#contenedor").html(response);
        }
    });}