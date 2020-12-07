<?php

require_once("../config/Conexion.php");
error_reporting(0);

class Usuario extends Conexion{

    public function login($data){
        $sql ="SELECT email, password FROM t_usuarios WHERE email=? AND password=?";
        $sql=Conexion::conectar()->prepare($sql);
        $sql->bindValue(1,$data['email'], PDO::PARAM_STR);
        $sql->bindValue(2, $data['password'], PDO::PARAM_STR);
        $query=$sql->execute();
        $query=$sql->fetch(PDO::FETCH_ASSOC);

        return $query;
    }
    public static function agregarUsuario($data){
        $sql="INSERT INTO t_usuarios (nombre,apellido,cedula,telefono,celular,direccion,email,usuario,password)
                      VALUES (?,?,?,?,?,?,?,?,?)";
        $sql=Conexion::conectar()->prepare($sql);
        $sql->bindValue(1, $data['nombre'], PDO::PARAM_STR);
        $sql->bindValue(2, $data['apellido'], PDO::PARAM_STR);
        $sql->bindValue(3, $data['cedula'], PDO::PARAM_STR);
        $sql->bindValue(4, $data['telefono'], PDO::PARAM_STR);
        $sql->bindValue(5, $data['celular'], PDO::PARAM_STR);
        $sql->bindValue(6, $data['direccion'], PDO::PARAM_STR);
        $sql->bindValue(7, $data['email'], PDO::PARAM_STR);
        $sql->bindValue(8, $data['usuario'], PDO::PARAM_STR);
        $sql->bindValue(9, $data['password'], PDO::PARAM_STR);
        $query=$sql->execute();
        return $query;
    }
    public function mostrarUsuarios(){
        $sql=" SELECT id_Usuario, CONCAT(nombre,' ', apellido) AS cliente FROM t_usuarios";
        $sql=Conexion::conectar()->prepare($sql);
        $sql->execute();
        $query=$sql->fetchAll();
        return $query;
    }

    public static function individual($searchParam){
		

	

        /*CONSULTA ANIMODO*/
        $sql1="SELECT animodo  FROM t_animodo WHERE id_Usuario=?";
        $sql1=Conexion::conectar()->prepare($sql1);
        $sql1->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sql1->execute();
        $response=$sql1->fetch();

        /*CONSULTA COLOR DE LA COMUNICACIÓN*/
        $sql2="SELECT valoracion, colorAmarillo,colorRojo,colorAzul,colorVerde FROM t_colorcomunicacion WHERE id_Usuario =?";
        $sql2=Conexion::conectar()->prepare($sql2);
        $sql2->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sql2->execute();
        $response2=$sql2->fetch();
        if($response2['valoracion']==1){
            $color='Amarillo';
        }elseif ($response2['valoracion']==2){
            $color='Rojo';
        }elseif ($response2['valoracion']==3){
            $color='Azul';
        }elseif ($response2['valoracion']==4){
            $color='Verde';
        }

        /*CONSULTA EVALNEGOCIADORA*/
        $sql3="SELECT valoracion, cualidad FROM t_evalnegociadora WHERE id_Usuario=?";
        $sql3=Conexion::conectar()->prepare($sql3);
        $sql3->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sql3->execute();
        $response3=$sql3->fetch();

        /*CONSULTA NIVEL DE PERSISTENCIA */
        $sql4="SELECT persistente  FROM t_nivelpersistencia WHERE id_Usuario=?";
        $sql4=Conexion::conectar()->prepare($sql4);
        $sql4->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sql4->execute();
        $response4=$sql4->fetch();

        /*CONSULTA TEST DE VAK*/
        $sql5="SELECT valoracion,visual,auditivo,kinestesico FROM t_testvak WHERE id_Usuario = ?";
        $sql5=Conexion::conectar()->prepare($sql5);
        $sql5->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sql5->execute();
        $response5=$sql5->fetch();
        if($response5['valoracion']==1){
            $test='VISUAL';
        }elseif ($response5['valoracion']==2){
            $test='AUDITIVO';
        }elseif ($response5['valoracion']==3){
            $test='KINESTÉSICO';
        }elseif($response5['valoracion']==0){
            $test='EXTRAORDINARIO(A)';
        }


        /*CONSULTA TIPOS DE CEREBRO*/
        $sql6="SELECT valoracion,cerebroIzq, cerebroCen,cerebroDer FROM t_tiposcerebro WHERE id_Usuario = ?";
        $sql6=Conexion::conectar()->prepare($sql6);
        $sql6->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sql6->execute();
        $response6=$sql6->fetch();

        /*CONSULTA */
        $sql7="SELECT * FROM t_usuarios AS s INNER JOIN  t_empresa AS e
        ON s.empresa=e.id_Empresa  
        WHERE id_Usuario = ?";
        $sql7=Conexion::conectar()->prepare($sql7);
        $sql7->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sql7->execute();
        $response7=$sql7->fetch();

        

       
       


        if($response6['valoracion']==1){
            $cerebro='Izquierdo';
        }elseif ($response6['valoracion']==2){
            $cerebro='Centro';
        }elseif ($response6['valoracion']==3){
            $cerebro='Derecho';
        }else{
            $cerebro='NO DEFINIDO';
        }

           $animodo="";
        /*INICIO SELECCIONA IMAGEN DE ANIMODO*/
        if($response['animodo']=='Abeja' && $cerebro=="Centro" && $color=="Rojo"){
            $animodo = "../img/Abeja09.png";
        }else if($response['animodo']=='Abeja' && $cerebro=="Izquierdo" && $color=="Rojo"){
            $animodo = "../img/Abeja07.png";
        }else if($response['animodo']=='Abeja' && $cerebro=="Derecho" && $color=="Rojo"){
            $animodo = "../img/Abeja08.png";
        }else if($response['animodo']=='Abeja' && $cerebro=="Centro" && $color=="Verde"){
            $animodo = "../img/Abeja12.png";
        }else if($response['animodo']=='Abeja' && $cerebro=="Izquierdo" && $color=="Verde"){
            $animodo = "../img/Abeja10.png";
        }else if($response['animodo']=='Abeja' && $cerebro=="Derecho" && $color=="Verde"){
            $animodo = "../img/Abeja11.png";
        }else if($response['animodo']=='Abeja' && $cerebro=="Centro" && $color=="Amarillo"){
            $animodo = "../img/Abeja03.png";
        }else if($response['animodo']=='Abeja' && $cerebro=="Izquierdo" && $color=="Amarillo"){
            $animodo = "../img/Abeja01.png";
        }else if($response['animodo']=='Abeja' && $cerebro=="Derecho" && $color=="Amarillo"){
            $animodo = "../img/Abeja02.png";
        }else if($response['animodo']=='Abeja' && $cerebro=="Centro" && $color=="Azul"){
            $animodo = "../img/Abeja06.png";
        }else if($response['animodo']=='Abeja' && $cerebro=="Izquierdo" && $color=="Azul"){
            $animodo = "../img/Abeja04.png";
        }else if($response['animodo']=='Abeja' && $cerebro=="Derecho" && $color=="Azul"){
            $animodo = "../img/Abeja05.png";
        }else if($response['animodo']=='Buho' && $cerebro=="Centro" && $color=="Rojo"){
            $animodo = "../img/Búho09.png";
        }else if($response['animodo']=='Buho' && $cerebro=="Izquierdo" && $color=="Rojo"){
            $animodo = "../img/Búho07.png";
        }else if($response['animodo']=='Buho' && $cerebro=="Derecho" && $color=="Rojo"){
            $animodo = "../img/Búho08.png";
        }else if($response['animodo']=='Buho' && $cerebro=="Centro" && $color=="Verde"){
            $animodo = "../img/Búho12.png";
        }else if($response['animodo']=='Buho' && $cerebro=="Izquierdo" && $color=="Verde"){
            $animodo = "../img/Búho10.png";
        }else if($response['animodo']=='Buho' && $cerebro=="Derecho" && $color=="Verde"){
            $animodo = "../img/Búho11.png";
        }else if($response['animodo']=='Buho' && $cerebro=="Centro" && $color=="Amarillo"){
            $animodo = "../img/Búho03.png";
        }else if($response['animodo']=='Buho' && $cerebro=="Izquierdo" && $color=="Amarillo"){
            $animodo = "../img/Búho01.png";
        }else if($response['animodo']=='Buho' && $cerebro=="Derecho" && $color=="Amarillo"){
            $animodo = "../img/Búho02.png";
        }else if($response['animodo']=='Buho' && $cerebro=="Centro" && $color=="Azul"){
            $animodo = "../img/Búho06.png";
        }else if($response['animodo']=='Buho' && $cerebro=="Izquierdo" && $color=="Azul"){
            $animodo = "../img/Búho04.png";
        }else if($response['animodo']=='Buho' && $cerebro=="Derecho" && $color=="Azul"){
            $animodo = "../img/Búho05.png";
            /*INICIO CONDICIONES CAMALEÓN*/
        }else if($response['animodo']=='Camaleon' && $cerebro=="Centro" && $color=="Rojo"){
            $animodo = "../img/Camaleón09.png";
        }else if($response['animodo']=='Camaleon' && $cerebro=="Izquierdo" && $color=="Rojo"){
            $animodo = "../img/Camaleón07.png";
        }else if($response['animodo']=='Camaleon' && $cerebro=="Derecho" && $color=="Rojo"){
            $animodo = "../img/Camaleón08.png";
        }else if($response['animodo']=='Camaleon' && $cerebro=="Centro" && $color=="Verde"){
            $animodo = "../img/Camaleón12.png";
        }else if($response['animodo']=='Camaleon' && $cerebro=="Izquierdo" && $color=="Verde"){
            $animodo = "../img/Camaleón10.png";
        }else if($response['animodo']=='Camaleon' && $cerebro=="Derecho" && $color=="Verde"){
            $animodo = "../img/Camaleón11.png";
        }else if($response['animodo']=='Camaleon' && $cerebro=="Centro" && $color=="Amarillo"){
            $animodo = "../img/Camaleón03.png";
        }else if($response['animodo']=='Camaleon' && $cerebro=="Izquierdo" && $color=="Amarillo"){
            $animodo = "../img/Camaleón01.png";
        }else if($response['animodo']=='Camaleon' && $cerebro=="Derecho" && $color=="Amarillo"){
            $animodo = "../img/Camaleón02.png";
        }else if($response['animodo']=='Camaleon' && $cerebro=="Centro" && $color=="Azul"){
            $animodo = "../img/Camaleón06.png";
        }else if($response['animodo']=='Camaleon' && $cerebro=="Izquierdo" && $color=="Azul"){
            $animodo = "../img/Camaleón04.png";
        }else if($response['animodo']=='Camaleon' && $cerebro=="Derecho" && $color=="Azul"){
            $animodo = "../img/Camaleón05.png";

            /* **INICIO CONDICIONAL CASTOR** */


        }else if($response['animodo']=='Castor' && $cerebro=="Centro" && $color=="Rojo"){
            $animodo = "../img/Castor09.png";
        }else if($response['animodo']=='Castor' && $cerebro=="Izquierdo" && $color=="Rojo"){
            $animodo = "../img/Castor07.png";
        }else if($response['animodo']=='Castor' && $cerebro=="Derecho" && $color=="Rojo"){
            $animodo = "../img/Castor08.png";
        }else if($response['animodo']=='Castor' && $cerebro=="Centro" && $color=="Verde"){
            $animodo = "../img/Castor12.png";
        }else if($response['animodo']=='Castor' && $cerebro=="Izquierdo" && $color=="Verde"){
            $animodo = "../img/Castor10.png";
        }else if($response['animodo']=='Castor' && $cerebro=="Derecho" && $color=="Verde"){
            $animodo = "../img/Castor11.png";
        }else if($response['animodo']=='Castor' && $cerebro=="Centro" && $color=="Amarillo"){
            $animodo = "../img/Castor03.png";
        }else if($response['animodo']=='Castor' && $cerebro=="Izquierdo" && $color=="Amarillo"){
            $animodo = "../img/Castor01.png";
        }else if($response['animodo']=='Castor' && $cerebro=="Derecho" && $color=="Amarillo"){
            $animodo = "../img/Castor02.png";
        }else if($response['animodo']=='Castor' && $cerebro=="Centro" && $color=="Azul"){
            $animodo = "../img/Castor06.png";
        }else if($response['animodo']=='Castor' && $cerebro=="Izquierdo" && $color=="Azul"){
            $animodo = "../img/Castor04.png";
        }else if($response['animodo']=='Castor' && $cerebro=="Derecho" && $color=="Azul"){
            $animodo = "../img/Castor05.png";
            /*INICIO CONDICIONAL DELFIN*/

        }else if($response['animodo']=='Delfin' && $cerebro=="Centro" && $color=="Rojo"){
            $animodo = "../img/Delfín09.png";
        }else if($response['animodo']=='Delfin' && $cerebro=="Izquierdo" && $color=="Rojo"){
            $animodo = "../img/Delfín07.png";
        }else if($response['animodo']=='Delfin' && $cerebro=="Derecho" && $color=="Rojo"){
            $animodo = "../img/Delfín08.png";
        }else if($response['animodo']=='Delfin' && $cerebro=="Centro" && $color=="Verde"){
            $animodo = "../img/Delfín12.png";
        }else if($response['animodo']=='Delfin' && $cerebro=="Izquierdo" && $color=="Verde"){
            $animodo = "../img/Delfín10.png";
        }else if($response['animodo']=='Delfin' && $cerebro=="Derecho" && $color=="Verde"){
            $animodo = "../img/Delfín11.png";
        }else if($response['animodo']=='Delfin' && $cerebro=="Centro" && $color=="Amarillo"){
            $animodo = "../img/Delfín03.png";
        }else if($response['animodo']=='Delfin' && $cerebro=="Izquierdo" && $color=="Amarillo"){
            $animodo = "../img/Delfín01.png";
        }else if($response['animodo']=='Delfin' && $cerebro=="Derecho" && $color=="Amarillo"){
            $animodo = "../img/Delfín02.png";
        }else if($response['animodo']=='Delfin' && $cerebro=="Centro" && $color=="Azul"){
            $animodo = "../img/Delfín06.png";
        }else if($response['animodo']=='Delfin' && $cerebro=="Izquierdo" && $color=="Azul"){
            $animodo = "../img/Delfín04.png";
        }else if($response['animodo']=='Delfin' && $cerebro=="Derecho" && $color=="Azul"){
            $animodo = "../img/Delfín05.png";
        }
        /*FIN SELECCIONA IMAGEN ANIMODO*/


        $individual='
                
<table class="table-bordered  table table-primary">
                            <tr>
                                <th colspan="5" class="text-center  " style="font-size: 25px;"><strong>REPORTE CLIENTE</strong></th>
                            </tr> 
                            <tr class="" width="100">
                                <th >Fecha:</th>
                                <td class="">'.$response7[10].'</td>
                                <th >Email</th>
                                <td class="">'.$response7[6].'</td>                                                                

                            </tr>                            
                            <tr class="col-lg-4" width="100">
                                <th>Cliente</th>
                                <td>'.$response7['nombre'].' '.$response7['apellido'].'</td>
                                <th>Celular</th>
                                <td>'.$response7['celular'].'</td>    
                                
                            </tr>
                            <tr class="col-lg-4" width="100">                                
                                <th >Empresa</th>
                                <td>'.$response7['empresa'].'</td>
                                <th >Cargo</th>
                                <td>'.$response7['cargo'].'</td>                                                                                                                                
                            </tr>
                            <tr class="col-lg-4" width="100">                                
                                <th >Profesión</th>
                                <td>'.$response7['profesion'].'</td>
                                <th >Sexo</th>
                                <td>'.$response7['sexo'].'</td>                                                                                                                                
                            </tr>                                                                                       
                        </table>
    <div class="row mt-5">
                <div class="col">
                      <table class="table table-bordered ">
                              <thead class="text-center text-white" style="background-color:#527318">
                                <th>Persistente</th>                                
                              </thead>
                              <tbody class="text-center">
                                <tr>
                                <td>'.$response4['persistente'].'</td>                                
                                </tr>                                
                              </tbody>
                            </table>
                </div>
                 <div class="col">
                    <table class="table table-bordered ">
                              <thead class="text-white  text-center" style="background-color:#FF5722">
                                <th>Test de Vak</th>                                
                              </thead>
                              <tbody class="text-center">
                                <tr>
                                <td>'.$test.'</td>
                                </tr>                                
                              </tbody>
                            </table>
                  </div>
                  <div class="col">
                        <table class="table table-bordered ">
                              <thead class="text-white text-center" style="background-color:#5e5e5e">
                                <th>Tipo de Cerebro</th>                        
                              </thead>
                              <tbody class="text-center">
                                <tr>
                                <td>'.$cerebro.'</td>
                                </tr>                                
                              </tbody>
                            </table>
                    </div>
             </div>
                <div class="row mt-5 mb-5">
                        <div class="col">                            
                            <table class="table table-bordered ">
                              <thead class="bg-primary text-white text-center">
                                <th >Animodo</th>
                                <th>Imagen</th>
                              </thead>
                              <tbody class="text-center">
                                <tr>
                                <td>'.$response['animodo'].'</td>
                                <td><img src="'.$animodo.'" alt="Animodo: Identificativo de la persona" style="margin:0 auto !important" width="100"></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        
                        <div class="col ">                        
                            <table class="table table-bordered">
                              <thead class="text-white text-center" style="background-color:#ec0101">
                                <th>Color Comunicación</th>
                              </thead>
                              <tbody class="text-center">
                                <tr>
                                <td>'.$color.'</td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        <div class="col">                        
                            <table class="table table-bordered">
                              <thead class="text-center text-white" style="background-color:#e6b400;">
                                <th>Negociador</th>
                                <th>Cualidad</th>
                              </thead>
                              <tbody class="text-center">
                                <tr>
                                <td>'.$response3['valoracion'].'</td>
                                <td>'.$response3['cualidad'].'</td>
                                </tr>                                
                              </tbody>
                            </table>
                        </div>
                </div>  
                <br>           
                <div class="row  mb-2 mt-4">
              <div class="col-lg-12">
                   <H2 class="text-center">
                      <strong>Color de la Comunicación</strong>
                   </H2>
              </div>
              <div class="col">
                     <canvas id="myChart" width="400" height="100"></canvas>
              </div>
             </div>
             <div class="row mt-5">
                        <h2 class="col-lg-12 text-center">
                            <strong>
                            Test de Vak
                            </strong>
                        </h2>
                        <div class="col-lg-12">
                            <canvas id="myChart2" width="400" height="125"></canvas>
                        </div>
             </div>
             <div class="row mt-5">
                        <H2 class="col-lg-12 text-center">
                            <strong>
                            Tipos de Cerebro
                            </strong>
                        </H2>
                        <div class="col-lg-12">
                            <canvas id="myChart3" width="400" height="125"></canvas>
                        </div>
             </div>
             <script>
    var ctx = document.getElementById(\'myChart\').getContext(\'2d\');
    var myChart = new Chart(ctx, {
        type: \'bar\',
        data: {
            labels: [\'Amarillo\',\'Rojo\',\'Azul\',\'Verde\'],
            datasets: [{
                label: \'Estadisticas en barra vertical\',
                                           data: ['.$response2['colorAmarillo'].','.$response2['colorRojo'].','.$response2['colorAzul'].','.$response2['colorVerde'].'],
                backgroundColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(236, 1, 1)\',
                    \'rgb(78, 115, 223)\',
                    \'rgb(82, 115, 24)\'                                      
                ],
                borderColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(236, 1, 1)\',
                    \'rgb(78, 115, 223)\',
                    \'rgb(82, 115, 24)\'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
    <script>
    var ctx = document.getElementById(\'myChart2\').getContext(\'2d\');
    var myChart = new Chart(ctx, {
        type: \'bar\',
        data: {
            labels: [\'Visual\',\'Auditivo\',\'Kinestésico\'],
            datasets: [{
                label: \'Estadisticas en barra vertical\',
                data: ['.$response5['visual'].','.$response5['auditivo'].','.$response5['kinestesico'].'],
                backgroundColor: [
                   \'rgb(82, 115, 24)\',
                    \'rgb(94, 94, 94)\',
                    \'rgb(236, 1, 1)\'
                ],
                borderColor: [
                    \'rgb(82, 115, 24)\',
                    \'rgb(94, 94, 94)\',
                    \'rgb(236, 1, 1)\'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById(\'myChart3\').getContext(\'2d\');
    var myChart = new Chart(ctx, {
        type: \'bar\',
        data: {
            labels: [\'Cerebro Izquierdo\',\'Cerebro Centro\',\'Cerebro Derecho\'],
            datasets: [{
                label: \'Estadisticas en barra vertical\',
               data: ['.$response6['cerebroIzq'].','.$response6['cerebroCen'].','.$response6['cerebroDer'].'],
                backgroundColor: [
                   \'rgb(230, 180, 0)\',
                    \'rgb(236, 1, 1)\',
                    \'rgb(78, 115, 223)\',

                                                           
                ],
                borderColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(236, 1, 1)\',
                    \'rgb(78, 115, 223)\',

                    
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>';
        return $individual;
    }


     public static function empresarial($searchParam){


        $ani = array(
            "Abeja"=>"Abeja",
            "Buho"=>"Buho",
            "Cameleon"=>"Camaleon",
            "Castor"=>"Castor",
            "Delfin"=>"Delfin",
        );

        /*Obtiene número de personas encuestadas
        *pertenecientes a una determinada empresa*/

        $sqlPerson="SELECT COUNT(nombre) as number FROM t_usuarios WHERE empresa =?";
        $sqlPerson=Conexion::conectar()->prepare($sqlPerson);
        $sqlPerson->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlPerson->execute();
        $num=$sqlPerson->fetch();


        /*CONSULTA ANIMODO*/
        $sql1="SELECT animodo  FROM t_animodo WHERE id_Usuario=?";
        $sql1=Conexion::conectar()->prepare($sql1);
        $sql1->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sql1->execute();
        $response=$sql1->fetch();


        /*CONSULTA ANIMODO ABEJA*/

        $sqlAbeja="SELECT       			
			       COUNT(a.animodo) as numAbeja
                   FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                   ON u.empresa = e.id_Empresa
                   INNER JOIN t_animodo AS a
                   ON u.id_Usuario=a.id_Usuario
                   WHERE u.empresa=? AND a.animodo=?;";
        $sqlAbeja=Conexion::conectar()->prepare($sqlAbeja);
        $sqlAbeja->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlAbeja->bindValue(2,$ani['Abeja'], PDO::PARAM_STR);
        $sqlAbeja->execute();
        $abeja=$sqlAbeja->fetch();


        /*CONSULTA ANIMODO BUHO*/

        $sqlBuho="SELECT       			
			       COUNT(a.animodo) as numBuho
                   FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                   ON u.empresa = e.id_Empresa
                   INNER JOIN t_animodo AS a
                   ON u.id_Usuario=a.id_Usuario
                   WHERE u.empresa=? AND a.animodo=?;";
        $sqlBuho=Conexion::conectar()->prepare($sqlBuho);
        $sqlBuho->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlBuho->bindValue(2,$ani['Buho'], PDO::PARAM_STR);
        $sqlBuho->execute();
        $buho=$sqlBuho->fetch();

        /*CONSULTA ANIMODO CASTOR*/

        $sqlCastor="SELECT       			
			       COUNT(a.animodo) as numCastor
                   FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                   ON u.empresa = e.id_Empresa
                   INNER JOIN t_animodo AS a
                   ON u.id_Usuario=a.id_Usuario
                   WHERE u.empresa=? AND a.animodo=?;";
        $sqlCastor=Conexion::conectar()->prepare($sqlCastor);
        $sqlCastor->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlCastor->bindValue(2,$ani['Castor'], PDO::PARAM_STR);
        $sqlCastor->execute();
        $castor=$sqlCastor->fetch();

        /*CONSULTA ANIMODO CAMALEÓN*/

        $sqlCamaleon="SELECT       			
			       COUNT(a.animodo) as numCamaleon
                   FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                   ON u.empresa = e.id_Empresa
                   INNER JOIN t_animodo AS a
                   ON u.id_Usuario=a.id_Usuario
                   WHERE u.empresa=? AND a.animodo=?;";
        $sqlCamaleon=Conexion::conectar()->prepare($sqlCamaleon);
        $sqlCamaleon->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlCamaleon->bindValue(2,$ani['Cameleon'], PDO::PARAM_STR);
        $sqlCamaleon->execute();
        $camaleon=$sqlCamaleon->fetch();


        /*CONSULTA ANIMODO DELFIN*/

        $sqlDelfin="SELECT       			
			       COUNT(a.animodo) as numDelfin
                   FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                   ON u.empresa = e.id_Empresa
                   INNER JOIN t_animodo AS a
                   ON u.id_Usuario=a.id_Usuario
                   WHERE u.empresa=? AND a.animodo=?;";
        $sqlDelfin=Conexion::conectar()->prepare($sqlDelfin);
        $sqlDelfin->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlDelfin->bindValue(2,$ani['Delfin'], PDO::PARAM_STR);
        $sqlDelfin->execute();
        $delfin=$sqlDelfin->fetch();


        /*CONSULTA COLOR DE LA COMUNICACIÓN - ESTADISTICAS*/

        $var1=1;
        $var2=2;
        $var3=3;
        $var4=4;
        /*CONSULTA NÚMERO DE  REGISTROS COLOR AMARILLO*/
        $sqlAmarillo="SELECT       			
			        COUNT(c.valoracion) as numAmarillo
                    FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                    ON u.empresa = e.id_Empresa
                    INNER JOIN t_colorcomunicacion AS c
                    ON u.id_Usuario=c.id_Usuario
                    WHERE u.empresa=? AND c.valoracion=?;";
        $sqlAmarillo=Conexion::conectar()->prepare($sqlAmarillo);
        $sqlAmarillo->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlAmarillo->bindValue(2,$var1, PDO::PARAM_INT);
        $sqlAmarillo->execute();
        $yellow=$sqlAmarillo->fetch();


        /*CONSULTA NÚMERO DE  REGISTROS COLOR ROJO*/
        $sqlRojo="SELECT       			
			        COUNT(c.valoracion) as numRojo
                    FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                    ON u.empresa = e.id_Empresa
                    INNER JOIN t_colorcomunicacion AS c
                    ON u.id_Usuario=c.id_Usuario
                    WHERE u.empresa=? AND c.valoracion=?;";
        $sqlRojo=Conexion::conectar()->prepare($sqlRojo);
        $sqlRojo->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlRojo->bindValue(2,$var2, PDO::PARAM_INT);
        $sqlRojo->execute();
        $red=$sqlRojo->fetch();


        /*CONSULTA NÚMERO DE  REGISTROS COLOR AZUL*/

        $sqlAzul="SELECT       			
			        COUNT(c.valoracion) as numAzul
                    FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                    ON u.empresa = e.id_Empresa
                    INNER JOIN t_colorcomunicacion AS c
                    ON u.id_Usuario=c.id_Usuario
                    WHERE u.empresa=? AND c.valoracion=?;";
        $sqlAzul=Conexion::conectar()->prepare($sqlAzul);
        $sqlAzul->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlAzul->bindValue(2,$var3, PDO::PARAM_INT);
        $sqlAzul->execute();
        $blue=$sqlAzul->fetch();


        /*CONSULTA NÚMERO DE  REGISTROS COLOR VERDE*/

        $sqlVerde="SELECT       			
			        COUNT(c.valoracion) as numVerde
                    FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                    ON u.empresa = e.id_Empresa
                    INNER JOIN t_colorcomunicacion AS c
                    ON u.id_Usuario=c.id_Usuario
                    WHERE u.empresa=? AND c.valoracion=?;";
        $sqlVerde=Conexion::conectar()->prepare($sqlVerde);
        $sqlVerde->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlVerde->bindValue(2,$var4, PDO::PARAM_INT);
        $sqlVerde->execute();
        $green=$sqlVerde->fetch();


       /*CONSULTA TIPOS DE CEREBRO ESTADISTICAS*/
        $izq=1;
        $cent=2;
        $der=3;

        /*CONSULTA CEREBRO IZQUIERDO*/
        $sqlIzq="SELECT       			
			        COUNT(c.valoracion) as izquierdo
                    FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                    ON u.empresa = e.id_Empresa
                    INNER JOIN t_tiposcerebro AS c
                    ON u.id_Usuario=c.id_Usuario
                    WHERE u.empresa=? AND c.valoracion=?;";
        $sqlIzq=Conexion::conectar()->prepare($sqlIzq);
        $sqlIzq->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlIzq->bindValue(2,$izq, PDO::PARAM_INT);
        $sqlIzq->execute();
        $left=$sqlIzq->fetch();


        /*CONSULTA CEREBRO CENTRO*/
        $sqlCen="SELECT       			
			        COUNT(c.valoracion) as centro
                    FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                    ON u.empresa = e.id_Empresa
                    INNER JOIN t_tiposcerebro AS c
                    ON u.id_Usuario=c.id_Usuario
                    WHERE u.empresa=? AND c.valoracion=?;";
        $sqlCen=Conexion::conectar()->prepare($sqlCen);
        $sqlCen->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlCen->bindValue(2,$cent, PDO::PARAM_INT);
        $sqlCen->execute();
        $center=$sqlCen->fetch();


        /*CONSULTA CEREBRO DERECHO*/
        $sqlDer="SELECT       			
			        COUNT(c.valoracion) as derecho
                    FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                    ON u.empresa = e.id_Empresa
                    INNER JOIN t_tiposcerebro AS c
                    ON u.id_Usuario=c.id_Usuario
                    WHERE u.empresa=? AND c.valoracion=?;";
        $sqlDer=Conexion::conectar()->prepare($sqlDer);
        $sqlDer->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlDer->bindValue(2,$der, PDO::PARAM_INT);
        $sqlDer->execute();
        $right=$sqlDer->fetch();

       /*CONSULTA TEST DE VAK PARA ESTADISTICAS*/

        /*CONSULTA TEST DE VAK VALORACIÓN 1*/

         $vak1 =1;
         $vak2 =2;
         $vak3 =3;
        $sqlVisual="SELECT       			
					COUNT(t.valoracion) as visual
                    FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                    ON u.empresa = e.id_Empresa
                    INNER JOIN t_testvak AS t
                    ON u.id_Usuario=t.id_Usuario
                    WHERE u.empresa=? AND t.valoracion=?;";
        $sqlVisual=Conexion::conectar()->prepare($sqlVisual);
        $sqlVisual->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlVisual->bindValue(2,$vak1, PDO::PARAM_INT);
        $sqlVisual->execute();
        $visual=$sqlVisual->fetch();


        /*CONSULTA TEST DE VAK VALORACIÓN 2*/
        $sqlAuditivo="SELECT       			
					COUNT(t.valoracion) as auditivo
                    FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                    ON u.empresa = e.id_Empresa
                    INNER JOIN t_testvak AS t
                    ON u.id_Usuario=t.id_Usuario
                    WHERE u.empresa=? AND t.valoracion=?;";
        $sqlAuditivo=Conexion::conectar()->prepare($sqlAuditivo);
        $sqlAuditivo->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlAuditivo->bindValue(2,$vak2, PDO::PARAM_INT);
        $sqlAuditivo->execute();
        $auditory=$sqlAuditivo->fetch();


        /*CONSULTA TEST DE VAK VALORACIÓN 3*/
        $sqlKin="SELECT       			
					COUNT(t.valoracion) as kinestesico
                    FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                    ON u.empresa = e.id_Empresa
                    INNER JOIN t_testvak AS t
                    ON u.id_Usuario=t.id_Usuario
                    WHERE u.empresa=? AND t.valoracion=?;";
        $sqlKin=Conexion::conectar()->prepare($sqlKin);
        $sqlKin->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlKin->bindValue(2,$vak3, PDO::PARAM_INT);
        $sqlKin->execute();
        $kinesthetic=$sqlKin->fetch();


        /*CONSULTA FORMA NEGOCIADORA ESTADISTICA*/

        /*CONSULTA FORMA NEGACIADORA VALORACIÓN BAJA*/
        $neg1="BAJO";
        $neg2="MEDIO";
        $neg3="ALTO";

        $sqlbajo="SELECT       			
					COUNT(n.valoracion) as bajo
                    FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                    ON u.empresa = e.id_Empresa
                    INNER JOIN t_evalnegociadora AS n
                    ON u.id_Usuario=n.id_Usuario
                    WHERE u.empresa=? AND n.valoracion=?;";
        $sqlbajo=Conexion::conectar()->prepare($sqlbajo);
        $sqlbajo->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlbajo->bindValue(2,$neg1, PDO::PARAM_STR);
        $sqlbajo->execute();
        $low=$sqlbajo->fetch();


        /*CONSULTA FORMA NEGACIADORA VALORACIÓN MEDIA*/

        $sqlMedio="SELECT       			
					COUNT(n.valoracion) as medio
                    FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                    ON u.empresa = e.id_Empresa
                    INNER JOIN t_evalnegociadora AS n
                    ON u.id_Usuario=n.id_Usuario
                    WHERE u.empresa=? AND n.valoracion=?;";
        $sqlMedio=Conexion::conectar()->prepare($sqlMedio);
        $sqlMedio->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlMedio->bindValue(2,$neg2, PDO::PARAM_STR);
        $sqlMedio->execute();
        $medium=$sqlMedio->fetch();


        /*CONSULTA FORMA NEGACIADORA VALORACIÓN ALTA*/

        $sqlAlto="SELECT       			
					COUNT(n.valoracion) as alto
                    FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                    ON u.empresa = e.id_Empresa
                    INNER JOIN t_evalnegociadora AS n
                    ON u.id_Usuario=n.id_Usuario
                    WHERE u.empresa=? AND n.valoracion=?;";
        $sqlAlto=Conexion::conectar()->prepare($sqlAlto);
        $sqlAlto->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlAlto->bindValue(2,$neg3, PDO::PARAM_STR);
        $sqlAlto->execute();
        $high=$sqlAlto->fetch();


        /*CONSULTA CAMBIO GENERACIONAL ESTADISTICAS*/

        /*CONSULTA EDAD ENTRE 18 Y 34*/

        $sqlGen1="SELECT COUNT(u.edad) gen1 
                  FROM t_usuarios AS u  INNER JOIN t_empresa AS e
                  ON u.empresa = e.id_Empresa
                  WHERE u.empresa =? AND u.edad BETWEEN 18 AND 34;";
        $sqlGen1=Conexion::conectar()->prepare($sqlGen1);
        $sqlGen1->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlGen1->execute();
        $edad1=$sqlGen1->fetch();

        /*CONSULTA EDAD ENTRE 35 Y 44*/
        $sqlGen2="SELECT COUNT(u.edad) gen2 
                  FROM t_usuarios AS u  INNER JOIN t_empresa AS e
                  ON u.empresa = e.id_Empresa
                  WHERE u.empresa =? AND u.edad BETWEEN 35 AND 44;";
        $sqlGen2=Conexion::conectar()->prepare($sqlGen2);
        $sqlGen2->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlGen2->execute();
        $edad2=$sqlGen2->fetch();

        /*CONSULTA EDAD ENTRE 45 Y 90*/
        $sqlGen3="SELECT COUNT(u.edad) gen3 
                  FROM t_usuarios AS u  INNER JOIN t_empresa AS e
                  ON u.empresa = e.id_Empresa
                  WHERE u.empresa =? AND u.edad BETWEEN 45 AND 90;";
        $sqlGen3=Conexion::conectar()->prepare($sqlGen3);
        $sqlGen3->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlGen3->execute();
        $edad3=$sqlGen3->fetch();



        /*CONSULTA NIVEL DE PERSISTENCIA ESTADISTICAS*/

        /*CONSULTA NIVEL DE PERSISTENCIA PERSISTENTE SI*/
        $yes="SI";
        $not="NO";
        $sqlSi="SELECT       			
					COUNT(n.persistente) as si
                    FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                    ON u.empresa = e.id_Empresa
                    INNER JOIN t_nivelpersistencia AS n
                    ON u.id_Usuario=n.id_Usuario
                    WHERE u.empresa=? AND n.persistente=?;";
        $sqlSi=Conexion::conectar()->prepare($sqlSi);
        $sqlSi->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlSi->bindValue(2,$yes, PDO::PARAM_STR);
        $sqlSi->execute();
        $si=$sqlSi->fetch();

        /*CONSULTA NIVEL DE PERSISTENCIA PERSISTENTE NO*/
        $sqlNo="SELECT       			
					COUNT(n.persistente) as no
                    FROM t_usuarios  AS u INNER JOIN t_empresa AS e
                    ON u.empresa = e.id_Empresa
                    INNER JOIN t_nivelpersistencia AS n
                    ON u.id_Usuario=n.id_Usuario
                    WHERE u.empresa=? AND n.persistente=?;";
        $sqlNo=Conexion::conectar()->prepare($sqlNo);
        $sqlNo->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sqlNo->bindValue(2,$not, PDO::PARAM_STR);
        $sqlNo->execute();
        $no=$sqlNo->fetch();





        /*CONSULTA COLOR DE LA COMUNICACIÓN*/
        $sql2="SELECT valoracion FROM t_colorcomunicacion WHERE id_Usuario =?";
        $sql2=Conexion::conectar()->prepare($sql2);
        $sql2->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sql2->execute();
        $response2=$sql2->fetch();
        if($response2['valoracion']==1){
            $color='ROJO';
        }elseif ($response2['valoracion']==2){
            $color='AZUL';
        }elseif ($response2['valoracion']==3){
            $color='VERDE';
        }else{
            $color='NO DEFINIDO';
        }

        /*CONSULTA EVALNEGOCIADORA*/
        $sql3="SELECT valoracion, cualidad FROM t_evalnegociadora WHERE id_Usuario=?";
        $sql3=Conexion::conectar()->prepare($sql3);
        $sql3->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sql3->execute();
        $response3=$sql3->fetch();

        /*CONSULTA NIVEL DE PERSISTENCIA */
        $sql4="SELECT persistente  FROM t_nivelpersistencia WHERE id_Usuario=?";
        $sql4=Conexion::conectar()->prepare($sql4);
        $sql4->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sql4->execute();
        $response4=$sql4->fetch();

        /*CONSULTA TEST DE VAK*/
        $sql5="SELECT valoracion FROM t_testvak WHERE id_Usuario = ?";
        $sql5=Conexion::conectar()->prepare($sql5);
        $sql5->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sql5->execute();
        $response5=$sql5->fetch();
        if($response5['valoracion']==1){
            $test='VISUAL';
        }elseif ($response5['valoracion']==2){
            $test='AUDITIVO';
        }elseif ($response5['valoracion']==3){
            $test='KINESTÉSICO';
        }else{
            $test='NO DEFINIDO';
        }


        /*CONSULTA TIPOS DE CEREBRO*/
        $sql6="SELECT valoracion FROM t_tiposcerebro WHERE id_Usuario = ?";
        $sql6=Conexion::conectar()->prepare($sql6);
        $sql6->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sql6->execute();
        $response6=$sql6->fetch();
        if($response6['valoracion']==1){
            $cerebro='IZQUIERDO';
        }elseif ($response6['valoracion']==2){
            $cerebro='CENTRO';
        }elseif ($response6['valoracion']==3){
            $cerebro='DERECHO';
        }else{
            $cerebro='NO DEFINIDO';
        }

        /*Consulta Empresa*/

        $sql7="SELECT * FROM t_empresa WHERE id_Empresa=?";
        $sql7=Conexion::conectar()->prepare($sql7);
        $sql7->bindValue(1,$searchParam, PDO::PARAM_INT);
        $sql7->execute();
        $response7=$sql7->fetch();

        $individual='
    <table class="table-bordered table-responsive-lg table table-primary " >
                            <tr>
                                <th colspan="5" class="text-center  " style="font-size: 25px;"><strong>REPORTE '.$response7['empresa'].'</strong></th>
                            </tr>
                            <tr class="" width="100">
                                <th >Fecha:</th>
                                <td class="">'.$response7['fechaRegistro'].'</td>
                                <th >Email</th>
                                <td class="col-sm-3" style="width:30%;">'.$response7['email'].'</td>                            

                            </tr>                            
                            <tr class="col-lg-4" width="100">
                                <th>Empresa</th>
                                <td>'.$response7['empresa'].'</td>
                                <th>Giro de Negocio</th>
                                <td>'.$response7['giro'].'</td>    
                                
                            </tr>
                            <tr class="col-lg-4" width="100">
                                <th >Ubicación</th>
                                <td>'.$response7['ubicacion'].'</td>
                                <th >Contacto</th>
                                <td>'.$response7['contacto'].'</td>                                
                            </tr>
                        </table>
    
                <div class="row mt-5">
                <div class="col-lg-12 text-black">
                      <table class="table table-bordered">
                              <thead class="bg-primary text-center text-white">
                                <th colspan="2">DATOS DESCRIPTIVOS</th>                                                   
                              </thead>
                              <tbody class="text-center">
                                <tr>
                                <td>Número de personas analizadas</td>
                                <td>'.$num['number'].'</td>                                
                                </tr>                        
                                <tr>
                                <td>Tipo de encuesta</td>
                                <td>Animodos</td>
                                </tr>
                                <tr>
                                <td>Tipo de encuesta</td>
                                <td>Colores de la Comunicación</td>
                                </tr>
                                <tr>
                                <td>Tipo de encuesta</td>
                                <td>Tipos de Cerebro</td>
                                </tr>
                                <tr>
                                <td>Tipo de encuesta</td>
                                <td>Test de Vak - Como Aprender</td>
                                </tr>
                                <tr>
                                <td>Tipo de encuesta</td>
                                <td>Forma Negociadora</td>
                                </tr>
                                <tr>
                                <td>Tipo de encuesta</td>
                                <td>Cambio Generacional</td>
                                </tr>
                                <tr>
                                <td>Tipo de encuesta</td>
                                <td>Nivel de Persistencia</td>
                                </tr>                                                                           
                              </tbody>
                       </table>
                </div>                
             </div>
                <div class="row mt-5 ">
                        <div class="col">                            
                            <table class="table table-bordered ">
                              <thead class="bg-primary text-white text-center">
                                <th colspan="2"><strong>ANIMODOS</strong></th>
                              </thead>
                              <tbody class="text-center">
                                <tr>
                                <td colspan="2" style="font-weight:700;font-size:1.3rem"><strong>Representación de cual es tu modo o manera de interactuar con las personas</strong></td>
                                </tr>
                                <tr>
                                <td>
                                    <canvas id="myChart4" width="400" height="125"></canvas>            
                                </td>                            
                                <td>
                                    <canvas id="myChart5" width="400" height="125"></canvas>
                                </td>                                          
                                </tr>
                              </tbody>  
                            </table>
                        </div>                        
                </div>
                <div class="row mt-5 ">
                        <div class="col">                            
                            <table class="table table-bordered ">
                              <thead class="bg-primary text-white text-center">
                                <th colspan="2"><strong>COLORES DE LA COMUNICACIÓN</strong></th>
                              </thead>
                              <tbody class="text-center">
                                <tr>
                                <td colspan="2" style="font-weight:700;font-size:1.3rem"><strong>Enfoque de como te comunicas con las personas</strong></td>
                                </tr>
                                <tr>
                                <td>
                                    <canvas id="myChart" width="400" height="125"></canvas>            
                                </td>                            
                                <td>
                                    <canvas id="myChart2" width="400" height="125"></canvas>
                                </td>                                          
                                </tr>
                              </tbody>  
                            </table>
                        </div>                        
                </div>
                <br> <br>
                <div class="row mt-5 ">
                        <div class="col">                            
                            <table class="table table-bordered ">
                              <thead class="bg-primary text-white text-center">
                                <th colspan="2"><strong>TIPOS DE CEREBRO</strong></th>
                              </thead>
                              <tbody class="text-center">
                                <tr>
                                <td colspan="2" style="font-weight:700;font-size:1.3rem"><strong>Dominancia Cerebral con la que te manejas en tu vida personal</strong></td>
                                </tr>
                                <tr>
                                <td>
                                    <canvas id="myChart6" width="400" height="125"></canvas>            
                                </td>                            
                                <td>
                                    <canvas id="myChart7" width="400" height="125"></canvas>
                                </td>                                          
                                </tr>
                              </tbody>  
                            </table>
                        </div>                        
                </div>
                                
                <div class="row mt-5 ">
                        <div class="col">                            
                            <table class="table table-bordered ">
                              <thead class="bg-primary text-white text-center">
                                <th colspan="2"><strong>TEST DE VAK - COMO APRENDE</strong></th>
                              </thead>
                              <tbody class="text-center">
                                <tr>
                                <td colspan="2" style="font-weight:700;font-size:1.3rem"><strong>Forma de aprendizaje de cada persona</strong></td>
                                </tr>
                                <tr>
                                <td>
                                    <canvas id="myChart8" width="400" height="125"></canvas>            
                                </td>                            
                                <td>
                                    <canvas id="myChart9" width="400" height="125"></canvas>
                                </td>                                          
                                </tr>
                              </tbody>  
                            </table>
                        </div>                        
                </div>
                <br> <br>
                <div class="row mt-5 ">
                        <div class="col">                            
                            <table class="table table-bordered ">
                              <thead class="bg-primary text-white text-center">
                                <th colspan="2"><strong>FORMA NEGOCIADORA</strong></th>
                              </thead>
                              <tbody class="text-center">
                                <tr>
                                <td colspan="2" style="font-weight:700;font-size:1.3rem"><strong>Capacidad que tienes de establecer una relación comercial enfocada en el GANAR - GANAR</strong></td>
                                </tr>
                                <tr>
                                <td>    
                                    <canvas id="myChart10" width="400" height="125"></canvas>            
                                </td>                            
                                <td>
                                    <canvas id="myChart11" width="400" height="125"></canvas>
                                </td>                                          
                                </tr>
                              </tbody>  
                            </table>
                        </div>                        
                </div>
                
                <div class="row mt-5 ">
                        <div class="col">                            
                            <table class="table table-bordered ">
                              <thead class="bg-primary text-white text-center">
                                <th colspan="2"><strong>CAMBIO GENERACIONAL</strong></th>
                              </thead>
                              <tbody class="text-center">
                                <tr>
                                <td colspan="2" style="font-weight:700;font-size:1.3rem"><strong>Información Básica para entender el enfoque de Capacitación y la Dirección Empresarial</strong></td>
                                </tr>
                                <tr>
                                <td>
                                    <canvas id="myChart12" width="400" height="125"></canvas>            
                                </td>                            
                                <td>
                                    <canvas id="myChart13" width="400" height="125"></canvas>
                                </td>                                          
                                </tr>
                              </tbody>  
                            </table>
                        </div>                        
                </div>
                <br> <br>
                <div class="row mt-5 ">
                        <div class="col">                            
                            <table class="table table-bordered ">
                              <thead class="bg-primary text-white text-center">
                                <th colspan="2"><strong>NIVEL DE PERSISTENCIA</strong></th>
                              </thead>
                              <tbody class="text-center">
                                <tr>
                                <td colspan="2" style="font-weight:700;font-size:1.3rem"><strong>Porcentaje de personas dentro de un equipo, que tiene la capacidad de ser persistente para cumplir un objetivo</strong></td>
                                </tr>
                                <tr>
                                <td>
                                    <canvas id="myChart14" width="400" height="125"></canvas>            
                                </td>                            
                                <td>
                                    <canvas id="myChart15" width="400" height="125"></canvas>
                                </td>                                          
                                </tr>
                              </tbody>  
                            </table>
                        </div>                        
                </div>
                    
                
                              
             <script>
                var ctx = document.getElementById(\'myChart\').getContext(\'2d\');
                var myChart = new Chart(ctx, {
                type: \'bar\',
        data: {
            labels: [\'Amarillo\',\'Rojo\',\'Azul\',\'Verde\'],
            datasets: [{
                label: \'Estadisticas en barra vertical\',
                data: ['.$yellow['numAmarillo'].','.$red['numRojo'].','.$blue['numAzul'].', '.$green['numVerde'].'],
                backgroundColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(236, 1, 1)\',
                    \'rgb(67, 115, 253)\',
                    \'rgb(82, 115, 24)\',                                          
                ],
                borderColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(236, 1, 1)\',
                    \'rgb(67, 115, 253)\',
                    \'rgb(82, 115, 24)\',   
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById(\'myChart2\').getContext(\'2d\');
    var myChart = new Chart(ctx, {
        type: \'pie\',
        data: {
            labels: [\'Amarillo\',\'Rojo\',\'Azul\',\'Verde\'],            
            datasets: [{
                label: \'Estadisticas en pasteles\',
                data: ['.$yellow['numAmarillo'].','.$red['numRojo'].','.$blue['numAzul'].', '.$green['numVerde'].'],
                backgroundColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(236, 1, 1)\',
                    \'rgb(67, 115, 253)\',
                    \'rgb(82, 115, 24)\',   
                ],
                borderColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(236, 1, 1)\',
                    \'rgb(67, 115, 253)\',
                    \'rgb(82, 115, 24)\',                                                                      
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById(\'myChart3\').getContext(\'2d\');
    var myChart = new Chart(ctx, {
        type: \'pie\',
        data: {
            labels: [\'Abeja\',\'Búho\',\'Camaleón\',\'Castor\',\'Delfin\'],
            datasets: [{
                label: \'Estadisticas en pasteles\',
                data: ['.$abeja['numAbeja'].','.$buho['numBuho'].', '.$camaleon['numCamaleon'].', '.$castor['numCastor'].','.$delfin['numDelfin'].'],
                backgroundColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(78, 115, 223)\',
                    \'rgb(236, 1, 1)\',
                    \'rgb(82, 115, 24)\',
                    \'rgb(137, 7, 237)\',
                                       
                      
                ],
                borderColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(78, 115, 223)\',
                    \'rgb(236, 1, 1)\',
                    \'rgb(82, 115, 24)\',
                    \'rgb(137, 7, 237)\'                        
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById(\'myChart4\').getContext(\'2d\');
    var myChart = new Chart(ctx, {
        type: \'bar\',
        data: {
            labels: [\'Abeja\',\'Búho\',\'Camaleón\',\'Castor\',\'Delfin\'],
            datasets: [{
                label: \'Estadisticas en barra vertical\',
                data: ['.$abeja['numAbeja'].','.$buho['numBuho'].', '.$camaleon['numCamaleon'].', '.$castor['numCastor'].','.$delfin['numDelfin'].'],
                backgroundColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(78, 115, 223)\',
                    \'rgb(236, 1, 1)\',
                    \'rgb(82, 115, 24)\',
                    \'rgb(137, 7, 237)\',                                       
                ],
                borderColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(78, 115, 223)\',
                    \'rgb(236, 1, 1)\',
                    \'rgb(82, 115, 24)\',
                    \'rgb(137, 7, 237)\',

                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById(\'myChart5\').getContext(\'2d\');
    var myChart = new Chart(ctx, {
        type: \'pie\',
        data: {
            labels: [\'Abeja\',\'Búho\',\'Camaleón\',\'Castor\',\'Delfin\'],
            datasets: [{
                label: \'Estadisticas en pasteles\',
                data: ['.$abeja['numAbeja'].','.$buho['numBuho'].', '.$camaleon['numCamaleon'].', '.$castor['numCastor'].','.$delfin['numDelfin'].'],
                backgroundColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(78, 115, 223)\',
                    \'rgb(236, 1, 1)\',
                    \'rgb(82, 115, 24)\',
                    \'rgb(137, 7, 237)\',
                ],
                borderColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(78, 115, 223)\',
                    \'rgb(236, 1, 1)\',
                    \'rgb(82, 115, 24)\',
                    \'rgb(137, 7, 237)\',                    
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
                var ctx = document.getElementById(\'myChart6\').getContext(\'2d\');
                var myChart = new Chart(ctx, {
                type: \'bar\',
        data: {
            labels: [\'Cerebro Izquierdo\',\'Cerebro Centro\',\'Cerebro Derecho\'],
            datasets: [{
                label: \'Estadisticas en barra vertical\',
                data: ['.$left['izquierdo'].','.$center['centro'].', '.$right['derecho'].'],
                backgroundColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(191, 8, 17)\',
                    \'rgb(0, 110, 144)\',                                        
                                       
                ],
                borderColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(191, 8, 17)\',
                    \'rgb(0, 110, 144)\',                    
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById(\'myChart7\').getContext(\'2d\');
    var myChart = new Chart(ctx, {
        type: \'pie\',
        data: {
            labels: [\'Cerebro Izquierdo\',\'Cerebro Centro\',\'Cerebro Derecho\'],
            datasets: [{
                label: \'Estadisticas en pasteles\',
                data: ['.$left['izquierdo'].','.$center['centro'].', '.$right['derecho'].'],
                backgroundColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(191, 8, 17)\',
                    \'rgb(0, 110, 144)\',
                    
                ],
                borderColor: [
                    \'rgb(230, 180, 0)\',
                    \'rgb(191, 8, 17)\',
                    \'rgb(0, 110, 144)\',
                    
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
                var ctx = document.getElementById(\'myChart8\').getContext(\'2d\');
                var myChart = new Chart(ctx, {
                type: \'bar\',
        data: {
            labels: [\'Visual\',\'Auditivo\',\'Kinestésico\'],
            datasets: [{
                label: \'Estadisticas en barra vertical\',
                data: ['.$visual['visual'].','.$auditory['auditivo'].', '.$kinesthetic['kinestesico'].'],
                backgroundColor: [
                    \'rgb(82, 115, 24)\',
                    \'rgb(94, 94, 94)\',
                    \'rgb(236, 1, 1)\',

                ],
                borderColor: [
                    \'rgb(82, 115, 24)\',
                    \'rgb(94, 94, 94)\',
                    \'rgb(236, 1, 1)\',                    
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById(\'myChart9\').getContext(\'2d\');
    var myChart = new Chart(ctx, {
        type: \'pie\',
        data: {
            labels: [\'Visual\',\'Auditivo\',\'Kinestésico\'],
            datasets: [{
                label: \'Estadisticas en pasteles\',
                data: ['.$visual['visual'].','.$auditory['auditivo'].', '.$kinesthetic['kinestesico'].'],
                backgroundColor: [
                    \'rgb(82, 115, 24)\',
                    \'rgb(94, 94, 94)\',
                    \'rgb(236, 1, 1)\',                    
                ],
                borderColor: [
                    \'rgb(82, 115, 24)\',
                    \'rgb(94, 94, 94)\',
                    \'rgb(236, 1, 1)\',                                        
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
                var ctx = document.getElementById(\'myChart10\').getContext(\'2d\');
                var myChart = new Chart(ctx, {
                type: \'bar\',
        data: {
            labels: [\'Alto\',\'Medio\',\'Bajo\'],
            datasets: [{
                label: \'Estadisticas en barra vertical\',
                data: ['.$high['alto'].', '.$medium['medio'].', '.$low['bajo'].'],
                backgroundColor: [
                    \'rgb(236, 1, 1)\',
                    \'rgb(255, 87, 34)\',
                    \'rgb(82, 115, 24)\',                                        
                                                         
                ],
                borderColor: [
                    \'rgb(236, 1, 1)\',
                    \'rgb(255, 87, 34)\',
                    \'rgb(82, 115, 24)\',                    
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById(\'myChart11\').getContext(\'2d\');
    var myChart = new Chart(ctx, {
        type: \'pie\',
        data: {
            labels: [\'Alto\',\'Medio\',\'Bajo\'],
            datasets: [{
                label: \'Estadisticas en pasteles\',
                data: ['.$high['alto'].', '.$medium['medio'].', '.$low['bajo'].'],
                backgroundColor: [
                    \'rgb(236, 1, 1)\',
                    \'rgb(255, 87, 34)\',
                    \'rgb(82, 115, 24)\',                    
                ],
                borderColor: [
                    \'rgb(236, 1, 1)\',
                    \'rgb(255, 87, 34)\',
                    \'rgb(82, 115, 24)\',                                        
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
                var ctx = document.getElementById(\'myChart12\').getContext(\'2d\');
                var myChart = new Chart(ctx, {
                type: \'bar\',
        data: {
            labels: [\'Gen 1\',\'Gen 2\',\'Gen 3\'],
            datasets: [{
                label: \'Estadisticas en barra vertical\',
                data: ['.$edad1['gen1'].','.$edad2['gen2'].','.$edad3['gen3'].'],
                backgroundColor: [
                    \'rgb(236, 1, 1)\',
                    \'rgb(255, 87, 34)\',
                    \'rgb(82, 115, 24)\',                                                                                
                ],
                borderColor: [
                    \'rgb(236, 1, 1)\',
                    \'rgb(255, 87, 34)\',
                    \'rgb(82, 115, 24)\',                    
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById(\'myChart13\').getContext(\'2d\');
    var myChart = new Chart(ctx, {
        type: \'pie\',
        data: {
            labels: [\'Gen 1\',\'Gen 2\',\'Gen 3\'],
            datasets: [{
                label: \'Estadisticas en pasteles\',
                data: ['.$edad1['gen1'].','.$edad2['gen2'].','.$edad3['gen3'].'],
                backgroundColor: [
                    \'rgb(236, 1, 1)\',
                    \'rgb(255, 87, 34)\',
                    \'rgb(82, 115, 24)\',                    
                ],
                borderColor: [
                \'rgb(236, 1, 1)\',
                    \'rgb(255, 87, 34)\',
                    \'rgb(82, 115, 24)\',                                        
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
                var ctx = document.getElementById(\'myChart14\').getContext(\'2d\');
                var myChart = new Chart(ctx, {
                type: \'bar\',
        data: {
            labels: [\'SI\',\'NO\'],
            datasets: [{
                label: \'Estadisticas en barra vertical\',
                data: ['.$si['si'].','.$no['no'].'],
                backgroundColor: [
                    \'rgb(94, 94, 94)\',
                    \'rgb(236, 1, 1)\',
                                                                                                                                                    
                ],
                borderColor: [
                    \'rgb(94, 94, 94)\',
                    \'rgb(236, 1, 1)\',                    
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
<script>
    var ctx = document.getElementById(\'myChart15\').getContext(\'2d\');
    var myChart = new Chart(ctx, {
        type: \'pie\',
        data: {
            labels: [\'SI\',\'NO\'],
            datasets: [{
                label: \'Estadisticas en pasteles\',
                data: ['.$si['si'].','.$no['no'].'],
                backgroundColor: [
                    \'rgb(94, 94, 94)\',
                    \'rgb(236, 1, 1)\',                    
                ],
                borderColor: [
                    \'rgb(94, 94, 94)\',
                    \'rgb(236, 1, 1)\',
                    
                                       
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
';


        return $individual;
        
    }

    public static function obtenerUsuario($idUsuario){
        $sql="SELECT * FROM t_usuarios WHERE idUsuario=?";
        $sql=Conexion::conectar()->prepare($sql);
        $sql->bindValue(1,$idUsuario, PDO::PARAM_INT);
        $sql->execute();
        $query=$sql->fetch();
        return $query;
    }

    public function editarUsuario($data){
        $sql="UPDATE t_usuarios
              SET nombre=?,
                  apellido=?,
                  cedula=?,
                  telefono=?,
                  celular=?,
                  direccion=?,
                  email=?
             WHERE 
                  idUsuario=?";
        $sql=Conexion::conectar()->prepare($sql);
        $sql->bindValue(1, $data['nombre'], PDO::PARAM_STR);
        $sql->bindValue(2, $data['apellido'], PDO::PARAM_STR);
        $sql->bindValue(3, $data['cedula'], PDO::PARAM_STR);
        $sql->bindValue(4, $data['telefono'], PDO::PARAM_STR);
        $sql->bindValue(5, $data['celular'], PDO::PARAM_STR);
        $sql->bindValue(6, $data['direccion'], PDO::PARAM_STR);
        $sql->bindValue(7, $data['email'], PDO::PARAM_STR);
        $sql->bindValue(8, $data['idUsuario'], PDO::PARAM_INT);
        $query=$sql->execute();

        return $query;
    }
    public static function eliminarUsuario($idUsuario){
        $sql="DELETE FROM t_usuarios WHERE idUsuario=?";
        $query=Conexion::conectar()->prepare($sql);
        $query->bindValue(1,$idUsuario, PDO::PARAM_INT);
        return $query->execute();
    }
}

?>
