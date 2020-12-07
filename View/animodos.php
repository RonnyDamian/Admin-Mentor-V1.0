<title>Animodos | iDrCrop.</title>
<?php  require_once("header.php")?>

<!--Inicio página Clientes -->

<!--Inicia contenido de la página  registraUsuarios-->
<!-- Begin Page Content -->
<div class="container-fluid ">

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12  ">
            <div class="card shadow mb-4 ">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                    <h3 class="m-0 font-weight-bold text-primary">
                        <i class="far fa-chart-bar"></i>
                        Estadisticas Animodos
                    </h3>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!--Inicio formulario registro usuarios -->
                    
                    <div class="row mt-2 mb-4">
                        <div class="col-lg-4">
                            <label for="nombre" ><strong>Parametro  de busca</strong></label>
                            <select name="searchParam" id="searchParam" class="form-control" onchange="parametro(this.value)">
                                <option value="" selected="selected" disabled="disabled">~~ Seleccione una opción ~~</option>
                                <option value="1">Todos</option>
                                <option value="2">Por fecha</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="filter"></div>
                    <div class="row mt-3 stadist">
                        <div class="col-lg-12">
                            <h2 class="text-center"><strong>ANIMODO</strong></h2>
                        </div>
                    </div>
                    <div class="row stadist">
                        <div class="col">
                            <table class="table-bordered table" >
                                <thead class="bg-primary text-center text-white">
                                <tr>
                                    <th>ANIMODO</th>
                                    <th>CANTIDAD</th>
                                    <th>PORCENTAJE</th>
                                </tr>
                                </thead>
                                <?php
                                require_once ('../Model/Animodo.php');
                                $obj = new Animodo();
                                $data = $obj->animodos();
                                $cantidad = $data['cantidad'];
                                $cantidad*=100;
                                $total=0;
                                $total=$data['cantidad']+$data['cantidad2']+$data['cantidad3']+$data['cantidad4']+
                                $data['cantidad9'];
                                ?>
                                <tbody class="text-center">
                                <tr id="N1" style="background-color:#9000ff;color:#ffffff">
                                    <td><?php
                                        if($data['cantidad']<=0)
                                        {
                                            echo "<script>
                                            document.getElementById('N1').style.display='none';
                                            </script>";
                                        }else{
                                        if(empty($data['animodo'])){
                                            echo 'Delfin';
                                        }else{
                                            echo $data['animodo'];
                                        }

                                        ?></td>
                                    <td><?php echo $data['cantidad'] ?></td>
                                    <td><?php
                                        $porcent=(($data['cantidad']*100)/$total);
                                        $final=number_format($porcent,2);
                                        echo $final .'%';} ?></td>
                                </tr>
                                <tr id="N2" style="background-color:#527318;color:#ffffff">
                                    <td ><?php
                                        if($data['cantidad2']<=0){
                                            echo "<script>
                                                document.getElementById('N2').style.display='none';
                                                </script>";
                                        }else{
                                        if(empty($data['animodo2'])){
                                            echo 'Castor';
                                        }else{
                                            echo $data['animodo2'];
                                        }

                                        ?></td>
                                    <td><?php echo $data['cantidad2']; ?></td>
                                    <td><?php
                                        $porcent=(($data['cantidad2']*100)/$total);
                                        $final=number_format($porcent,2);
                                        echo $final .'%';
                                        }?></td>
                                </tr>
                                <tr id="N3" class="bg-primary text-white">
                                    <td>
                                        <?php
                                        if($data['cantidad3']<=0){
                                            echo "<script>
                                            document.getElementById('N3').style.display='none';
                                                  </script>";
                                        }else{
                                        if(empty($data['animodo3'])){
                                            echo 'Buho';
                                        }else{
                                            echo $data['animodo3'];
                                        }
                                        ?>
                                    </td>
                                    <td><?php  echo $data['cantidad3'] ?></td>
                                    <td><?php
                                        $porcent=(($data['cantidad3']*100)/$total);
                                        $final=number_format($porcent,2);
                                        echo $final .'%';
                                        }?></td>
                                </tr>
                                <tr ID="N4" style="background-color:#e6b400;color:#ffffff">
                                    <td>
                                        <?php
                                        if($data['cantidad4']<=0){
                                            echo "<script>
                                             document.getElementById('N4').style.display='none';
                                                   </script>";
                                        }else{
                                        if(empty($data['animodo4'])){
                                            echo 'Abeja';
                                        }else{
                                            echo $data['animodo4'];
                                        }
                                        ?>
                                    </td>
                                    <td><?php  echo $data['cantidad4'] ?></td>
                                    <td><?php
                                        $porcent=(($data['cantidad4']*100)/$total);
                                        $final=number_format($porcent,2);
                                        echo $final .'%';
                                        }?></td>
                                </tr>
                                <tr id="N9" style="background-color:#ec0101;color:#ffffff">
                                    <td>
                                        <?php
                                        if($data['cantidad9']<=0){
                                            echo "<script>
                                                document.getElementById('N9').style.display='none';
                                                  </script>";
                                        }else{
                                        if(empty($data['animodo9'])){
                                            echo 'Camaleón';
                                        }else{
                                            echo $data['animodo9'];
                                        }
                                        ?>
                                    </td>
                                    <td><?php  echo $data['cantidad9'] ?></td>
                                    <td><?php
                                        $porcent=(($data['cantidad9']*100)/$total);
                                        $final=number_format($porcent,2);
                                        echo $final .'%';
                                        }?></td>
                                </tr>
                                </tbody>
                                <tfoot class="bg-primary text-center text-white">
                                <tr>
                                    <td>TOTAL</td>
                                    <td><?php
                                        echo $total;
                                        ?></td>
                                    <td><?php echo 100 . '%' ?></td>
                                </tr>
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
                </div>
            </div>
        </div>
    </div>
</div>



<!--Fin página Clientes -->


<?php require_once ("footer.php")?>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Abejas','Buho','Camaleón','Castor','Delfin'],
            datasets: [{
                label: 'Estadisticas en barra vertical',
                data: [<?php echo $data['cantidad4'];?>,<?php echo $data['cantidad3'];?>,<?php echo $data['cantidad9']?>,<?php echo $data['cantidad2'] ?>,<?php echo $data['cantidad'];?>],
                backgroundColor: [
                    'rgb(230, 180, 0)',
                    'rgb(78, 115, 223)',
                    'rgb(236, 1, 1)',
                    'rgb(82, 115, 24)',
                    'rgb(137, 7, 237)'  
                ],
                borderColor: [
                    'rgb(230, 180, 0)',
                    'rgb(78, 115, 223)',
                    'rgb(236, 1, 1)',
                    'rgb(82, 115, 24)',
                    'rgb(137, 7, 237)',
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
    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Abeja','Buho','Camaleón','Castor','Delfin'],
            datasets: [{
                label: 'Estadisticas en pasteles',
                data: [<?php echo $data['cantidad4'];?>,<?php echo $data['cantidad3'];?>,<?php echo $data['cantidad9']?>,<?php echo $data['cantidad2'] ?>,<?php echo $data['cantidad'];?>],
                backgroundColor: [
                    'rgb(230, 180, 0)',
                    'rgb(78, 115, 223)',
                    'rgb(236, 1, 1)',
                    'rgb(82, 115, 24)',
                    'rgb(137, 7, 237)',
                ],
                borderColor: [
                    'rgb(230, 180, 0)',
                    'rgb(78, 115, 223)',
                    'rgb(236, 1, 1)',
                    'rgb(82, 115, 24)',
                    'rgb(137, 7, 237)',
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