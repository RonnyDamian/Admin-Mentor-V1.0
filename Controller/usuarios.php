<?php
 require_once ("../Model/Usuario.php");

 $obj = new Usuario();

 $data= array(
     "nombre"=>$_POST['nombre'],
     "apellido"=>$_POST['apellido'],
     "cedula"=>$_POST['cedula'],
     "telefono"=>$_POST['telefono'],
     "celular"=>$_POST['celular'],
     "direccion"=>$_POST['direccion'],
     "email"=>$_POST['email'],
     "usuario"=>$_POST['usuario'],
     "password"=>$_POST['password']
 );

$strCedula=isset($_POST['cedula'])? $_POST['cedula']:'';
$validaCedula=$obj->validaCedula($strCedula);
if($validaCedula=="CedulaCorrecta"){
    $result=$obj->valida_Email_Cedula($data);
    if(is_array($result)==true and count($result)==0){
        echo  $obj->agregarUsuario($data);
    }else{
        echo 2;
    }
}else{
    echo 3;
}



?>
