function empresarial(valor){

        $.ajax({
            url:'../Controller/empresarial.php',
            type:'POST',
            data:{searchParam:valor},
            success:function (response) {
                $("#contenedor").html(response);
            }
        });
    }
