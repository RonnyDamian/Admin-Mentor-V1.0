<?php
include_once '../config/Conexion.php';
$objeto = new Conexion();
$conexion = $objeto->conectar();
//recepción de datos enviados mediante POST desde ajax
$usuario  = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$consulta = "SELECT * FROM t_admin WHERE email=? AND clave=?";
$resultado = $conexion->prepare($consulta);
$resultado->bindValue(1,$usuario, PDO::PARAM_STR);
$resultado->bindValue(2,$password, PDO::PARAM_STR);
$resultado->execute();
if($resultado->rowCount() >= 1){
 $data = $resultado->fetch();
 $user = $data['nombre'] . " " . $data['apellido'];
 session_start();
 $_SESSION['s_usuario'] =$user;
}else{
 $_SESSION["s_usuario"] = null;
 $data=null;
}
print json_encode($data);
$conexion=null;