function parametro(valor){
        $.ajax({
            url:'../Controller/animodos.php',
            type:'POST',
            data:{searchParam:valor},
            success:function (response) {
                $("#filter").html(response);
            }
        });
    }
    