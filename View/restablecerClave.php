<?php
  $email = isset($_GET['email'])? $_GET['email']:'';
//$email="admin@gmail.com";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Restablecer contraseña</title>

    <!-- Custom fonts for this template-->
    <link href="../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../public/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/toast/toastr.min.css">

</head>

<body class="bg-gradient-light">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">¿Restablecer contraseña?</h1>
                                </div>
                                <form class="user" id="frmEmail2" onsubmit="return restableceClave();" method="post">
                                    <div class="form-group">
                                        <label for="clave">Por favor, ingrese su nueva contraseña</label>
                                        <input type="password" class="form-control form-control-user" id="clave" name="clave"  required minlength="8">
                                        <input type="hidden" name="email" id="email" value="<?php echo $email;?>">
                                    </div>
                                    <button  class="btn btn-primary btn-user btn-block">
                                        Restablecer contraseña
                                    </button>
                                </form>
                                <hr><div class="text-center">
                                    <a class="small" href="../index.php">¿Ya tiene una cuenta? Iniciar Sesión</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="../public/vendor/jquery/jquery.min.js"></script>
<script src="../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../public/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../public/js/sb-admin-2.min.js"></script>
<script src="../public/toast/toastr.min.js"></script>
<script src="../js/email.js"></script>

</body>

</html>
