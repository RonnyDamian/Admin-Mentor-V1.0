<?php
error_reporting(0);
require_once ("../config/Conexion.php");
Class Animodo extends  Conexion{

    function filtraFecha($searchParam){
        $fecha = "
        <hr>
        
        <div class='col-lg-4'>
        <label for='fechaInicial'>Fecha Inicial</label>
        <input type='date' class='form-control' name='fechaInicial' id='fechaInicial'>
        </div>
        <div class='col-lg-4'>
        <label for='fechaFin'>Fecha Final</label>
        <input type='date' class='form-control' name='fechaFin' id='fechaFin'>                 
        </div>
        <div class=\"col-lg-4\">
        <br>
        <button type=submit class=\"btn btn-success py-sm-2 mt-2 float left form-control \" name=\"enviar\"> <i class=\"fa fa-search\"> Buscar</i></button>
        </div> 
        ";

        return $fecha;
    }

    function animodos(){
        $animodos = array(
            'Delfin'=>'Delfin',
            'Castor'=>'Castor',
            'Buho'=>'Buho',
            'Abeja'=>'Abeja',
            'Delfin y Buho'=>'Delfin y Buho',
            'Abeja y Castor'=>'Abeja y Castor',
            'Abeja y Delfin'=>'Abeja y Delfin',
            'Castor y Buho'=>'Castor y Buho',
            'Camaleon'=>'Camaleon'
        );
        $sql1="SELECT animodo,COUNT(animodo) AS cantidad 
               FROM t_animodo WHERE animodo=?";
        $sql1=Conexion::conectar()->prepare($sql1);
        $sql1->bindValue(1,$animodos['Delfin'], PDO::PARAM_STR);
        $sql1->execute();
        $response=$sql1->fetch();


        $sql2="SELECT animodo, COUNT(animodo) AS cantidad 
               FROM t_animodo WHERE animodo=? ";
        $sql2=Conexion::conectar()->prepare($sql2);
        $sql2->bindValue(1,$animodos['Castor'],PDO::PARAM_STR);
        $sql2->execute();
        $response2=$sql2->fetch();

        $sql3="SELECT animodo, COUNT(animodo) AS cantidad 
               FROM t_animodo WHERE animodo=? ";
        $sql3=Conexion::conectar()->prepare($sql3);
        $sql3->bindValue(1,$animodos['Buho'],PDO::PARAM_STR);
        $sql3->execute();
        $response3=$sql3->fetch();

        $sql4="SELECT animodo, COUNT(animodo) AS cantidad 
               FROM t_animodo WHERE animodo=? ";
        $sql4=Conexion::conectar()->prepare($sql4);
        $sql4->bindValue(1,$animodos['Abeja'],PDO::PARAM_STR);
        $sql4->execute();
        $response4=$sql4->fetch();

        $sql5="SELECT animodo, COUNT(animodo) AS cantidad 
               FROM t_animodo WHERE animodo=? ";
        $sql5=Conexion::conectar()->prepare($sql5);
        $sql5->bindValue(1,$animodos['Delfin y Buho'],PDO::PARAM_STR);
        $sql5->execute();
        $response5=$sql5->fetch();

        $sql6="SELECT animodo, COUNT(animodo) AS cantidad 
               FROM t_animodo WHERE animodo=? ";
        $sql6=Conexion::conectar()->prepare($sql6);
        $sql6->bindValue(1,$animodos['Abeja y Castor'],PDO::PARAM_STR);
        $sql6->execute();
        $response6=$sql6->fetch();

        $sql7="SELECT animodo, COUNT(animodo) AS cantidad 
               FROM t_animodo WHERE animodo=? ";
        $sql7=Conexion::conectar()->prepare($sql7);
        $sql7->bindValue(1,$animodos['Abeja y Delfin'],PDO::PARAM_STR);
        $sql7->execute();
        $response7=$sql7->fetch();

        $sql8="SELECT animodo, COUNT(animodo) AS cantidad 
               FROM t_animodo WHERE animodo=? ";
        $sql8=Conexion::conectar()->prepare($sql8);
        $sql8->bindValue(1,$animodos['Castor y Buho'],PDO::PARAM_STR);
        $sql8->execute();
        $response8=$sql8->fetch();

        $sql9="SELECT animodo, COUNT(animodo) AS cantidad 
               FROM t_animodo WHERE animodo=? ";
        $sql9=Conexion::conectar()->prepare($sql9);
        $sql9->bindValue(1,$animodos['Camaleon'],PDO::PARAM_STR);
        $sql9->execute();
        $response9=$sql9->fetch();

        $response['animodo2']=$response2['animodo'];
        $response['cantidad2']=$response2['cantidad'];

        $response['animodo3']=$response3['animodo'];
        $response['cantidad3']=$response3['cantidad'];

        $response['animodo4']=$response4['animodo'];
        $response['cantidad4']=$response4['cantidad'];

        $response['animodo5']=$response5['animodo'];
        $response['cantidad5']=$response5['cantidad'];

        $response['animodo6']=$response6['animodo'];
        $response['cantidad6']=$response6['cantidad'];

        $response['animodo7']=$response7['animodo'];
        $response['cantidad7']=$response7['cantidad'];

        $response['animodo8']=$response8['animodo'];
        $response['cantidad8']=$response8['cantidad'];

        $response['animodo9']=$response9['animodo'];
        $response['cantidad9']=$response9['cantidad'];



        return $response;
    }


}

?>
