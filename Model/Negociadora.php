<?php

require_once ("../config/Conexion.php");
error_reporting(0);
Class Negociadora extends  Conexion{

    function filtraFecha($searchParam){
        $fecha = "
        <hr>
        <div class='row'>
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
        </div>
        ";

        return $fecha;
    }

    function maker($searchParam){

        /*CONSULTA NEGOCIADOR VALORACIÓN - ALTA */
        $valoracion=array(
            'ALTO'=>'ALTO',
            'MEDIO'=>'MEDIO',
            'BAJO'=>'BAJO');

        $sql1="SELECT COUNT(valoracion) AS cantidad FROM t_evalnegociadora WHERE valoracion =?;";
        $sql1=Conexion::conectar()->prepare($sql1);
        $sql1->bindValue(1,$valoracion['ALTO'], PDO::PARAM_STR);
        $sql1->execute();
        $response=$sql1->fetch();

        /*CONSULTA NEGOCIADOR VALORACIÓN - MEDIO*/
        $sql2="SELECT COUNT(valoracion) AS cantidad FROM t_evalnegociadora WHERE valoracion =?;";
        $sql2=Conexion::conectar()->prepare($sql2);
        $sql2->bindValue(1,$valoracion['MEDIO'], PDO::PARAM_STR);
        $sql2->execute();
        $response2=$sql2->fetch();

        /*CONSULTA NEGOCIADOR VALORACIÓN BAJA*/
        $sql3="SELECT COUNT(valoracion) AS cantidad FROM t_evalnegociadora WHERE valoracion =?;";
        $sql3=Conexion::conectar()->prepare($sql3);
        $sql3->bindValue(1,$valoracion['BAJO'], PDO::PARAM_INT);
        $sql3->execute();
        $response3=$sql3->fetch();
        $total=0;
        $total=$response['cantidad']+$response2['cantidad']+$response3['cantidad'];
        $porcent=(($response['cantidad']*100)/$total);
        $porcent2=(($response2['cantidad']*100)/$total);
        $porcent3=(($response3['cantidad']*100)/$total);
        $final=number_format($porcent,2);
        $final2=number_format($porcent2,2);
        $final3=number_format($porcent3,2);
        $comunication='
                <div class="row mt-3 stadist">
                        <div class="col-lg-12">
                            <h2 class="text-center"><strong>Forma Negociadora</strong></h2>
                        </div>
              </div>
              <div class="row">
                    <div class="col">
                        <table class="table-bordered table" >
                                <thead class="bg-primary text-center text-white">
                                <tr>
                                    <th>FORMA NEGOCIADORA </th>
                                    <th>CANTIDAD</th>
                                    <th>PORCENTAJE</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr style="background-color:#ec0101;color:#ffffff">
                                        <td>ALTO</td>
                                        <td>'.$response['cantidad'].'</td>
                                        <td>'.$final.'%</td>
                                    </tr>       
                                    <tr style="background-color:#FF5722;color:#ffffff">
                                        <td>MEIDO</td>
                                        <td>'.$response2['cantidad'].'</td>
                                        <td>'.$final2.'%</td>                                        
                                    </tr>
                                    <tr style="background-color:#527318;color:#ffffff">
                                        <td>BAJO</td>
                                        <td>'.$response3['cantidad'].'</td>
                                        <td>'.$final3.'%</td>
                                    </tr>
                                </tbody>
                                <tfoot class="bg-primary text-center text-white">
                                    <td><strong>TOTAL</strong></td>
                                    <td>'.$total.'</td>
                                    <td>100%</td>
                                </tfoot>
                        </table>
                    </div>   
              </div>
              <div class="row  mb-2 mt-5">
              <div class="col-lg-12">
                   <H2 class="text-center">
                      <strong>Diagrama de barras</strong>
                   </H2>
              </div>
              <div class="col">
                     <canvas id="myChart" width="400" height="100"></canvas>
              </div>
             </div>
             <div class="row mt-5">
                        <H2 class="col-lg-12 text-center">
                            <strong>
                            Diagrama de pasteles
                            </strong>
                        </H2>
                        <div class="col-lg-12">
                            <canvas id="myChart2" width="400" height="125"></canvas>
                        </div>
             </div>
             <script>
    var ctx = document.getElementById(\'myChart\').getContext(\'2d\');
    var myChart = new Chart(ctx, {
        type: \'bar\',
        data: {
            labels: [\'Alto\',\'Medio\',\'Bajo\'],
            datasets: [{
                label: \'Estadisticas en barra vertical\',
                data: ['.$response['cantidad'].', '.$response2['cantidad'].','.$response3['cantidad'].'],
                backgroundColor: [
                    \'rgb(236, 1, 1)\',
                    \'rgb(255, 87, 34)\',
                    \'rgb(82, 115, 24)\'                    
                ],
                borderColor: [
                    \'rgb(236, 1, 1)\',
                    \'rgb(255, 87, 34)\',
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
        type: \'pie\',
        data: {
            labels: [\'Alto\',\'Medio\',\'Bajo\'],
            datasets: [{
                label: \'Estadisticas en pasteles\',
                data: ['.$response['cantidad'].', '.$response2['cantidad'].','.$response3['cantidad'].'],
                backgroundColor: [
                    \'rgb(236, 1, 1)\',
                    \'rgb(255, 87, 34)\',
                    \'rgb(82, 115, 24)\'    
                ],
                borderColor: [
                    \'rgb(236, 1, 1)\',
                    \'rgb(255, 87, 34)\',
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
</script>';
        return $comunication;

    }


}

?>
