function inidividual(valor){

        $.ajax({
            url:'../Controller/individual.php',
            type:'POST',
            data:{searchParam:valor},
            success:function (response) {
                $("#contenedor").html(response);
            }
        });
    }
