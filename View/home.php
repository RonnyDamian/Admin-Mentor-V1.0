<?php
/*Llamado del archivo header
 *contenedor del menu
*/
require_once("header.php");
?>

    <style>
        @media  (max-width: 1075px){
            img{
                  width:  250px;
                height: 150px;
                margin:auto;
            }
        }
        @media  (max-width: 884px){
            img{
                width:  200px;
                height: 100px;
                margin:auto;
            }
        }
        @media  (max-width: 768px){
            img{
                width:  400px;
                height: 200px;
                margin:auto;
            }
        }
        @media  (max-width: 590px){
            img{
                width:  300px;
                height: 150px;
                margin:auto;
            }
        }
        @media  (max-width: 488px){
            img{
                width:  150px;
                height: 90px;
                margin:auto;
            }
        }
    </style>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Página Principal</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><h4><strong>Positive Mind</strong></h4></div>
                                <div class="col-auto form-row">
                                    <img src="../public/img/logo.png" alt="Junta de Agua Pilalo" width="450" height="200" class="mt-3">
                                </div>
                                <p class="text-justify mt-3 mb-3">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Ipsam, pariatur, saep
                                    e. Ad adipisci aliquam, autem deleniti d
                                    icta doloremque ducimus eius excepturi f
                                    uga fugiat ipsa, ipsum magni maxime mol
                                    estiae neque pariatur perferendis quas qu
                                    isquam quo repellat reprehenderit verita
                                    tis, vero voluptatem? Quo!</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><h4><strong>IDRCROP</strong></h4></div>
                                <div class="col-auto form-row">
                                    <img src="../public/img/idrcrop.jpeg" alt="Junta de Agua Pilalo" width="450" height="200" class="mt-3">
                                </div>
                                <p class="text-justify mt-3 mb-3">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Ipsam, pariatur, saep
                                    e. Ad adipisci aliquam, autem deleniti d
                                    icta doloremque ducimus eius excepturi f
                                    uga fugiat ipsa, ipsum magni maxime mol
                                    estiae neque pariatur perferendis quas qu
                                    isquam quo repellat reprehenderit verita
                                    tis, vero voluptatem? Quo!</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->



<?php
/*Llamado del archivo footer
 *contenedor del pie de pagi
 * y modal cierre de sesión
 *  */
require_once("footer.php");
?>