<?php
session_start();
error_reporting(0);
if(empty($_SESSION['s_usuario'])){
    header("Location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../img/icono2.png" type="image/x-icon" style="border-radius: 50%">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema para el control de registros en la junta de agua Salcedo">
    <meta name="author" content="Brayan Chiluisa, Adriana Casa">

    <title>Admin | iDrCrop.</title>

    <!-- Custom fonts for this template-->
    <link href="../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../public/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../public/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/toast/toastr.min.css">
    <link rel="stylesheet" href="../public/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="../public/css/select2.min.css">
    <link rel="stylesheet" href="../public/datepicker/clockpicker.css">


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex  " href="../View/home.php">
            <div class="sidebar-brand-icon">
                <i class="fas fa-fw fa-home"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Inicio</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">


        <li class="nav-item">
            <a class="nav-link" href="animodos.php">
                <i class="fab fa-alipay"></i>
                <span>Animodos</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="cambioGeneracional.php">
                <i class="fab fa-page4"></i>
                <span>Cambio Generacional</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="colorComunicacion.php">
                <i class="fab fa-empire"></i>
                <span>Color Comunicación</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">


        <li class="nav-item">
            <a class="nav-link" href="formaNegociadora.php">
                <i class="fas fa-user-tie"></i>
                <span>Forma Negociadora</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="nivelPersistencia.php">
                <i class="fas fa-signal"></i>
                <span>Nivel de Persistencia</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="empresa.php">
                <i class="fas fa-edit"></i>
                <span>Registrar Empresa</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="testVak.php">
                <i class="far fa-file-alt"></i>
                <span>Test de Vak</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="tiposCerebro.php">
                <i class="fas fa-brain"></i>
                <span>Tipos de Cerebro</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">


        <!--Inicio Navegación Asistencias-->


        <!--Inicio Navegación Gestión-->
        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                <i class="fas fa-fw fa-chart-pie"></i>
                <span>Estadisticas</span>
            </a>
            <div id="multiCollapseExample1" class="collapse" aria-labelledby="headingTwo" data-parent="">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="individual.php">
                        <i class="fas fa-chart-bar"></i>
                        Individual
                    </a>
                    <a class="collapse-item" href="empresarial.php">
                        <i class="fas fa-chart-line"></i>
                        Empresarial
                    </a>
                </div>
            </div>
        </li>
        <hr class="sidebar-divider">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="background-color: #4e73df !important;">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->


                    <!-- Nav Item - Alerts -->



                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-white  mr-3 " style="color:#ffffff !important" ></span><strong><?php echo $_SESSION['s_usuario']?></strong>


                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Perfil
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Ajustes
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Cerrar Sesión
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>