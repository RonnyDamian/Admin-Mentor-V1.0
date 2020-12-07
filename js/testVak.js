function testVak(valor){
    $.ajax({
        url:'../Controller/testVak.php',
        type:'POST',
        data:{searchParam:valor},
        success:function (response) {
            $("#contenedor").html(response);
        }
    });}