<?php

require_once ('../Model/Empresa.php');
$obj= new Empresa();

$id_Empresa=$_POST['id_Empresa'];

echo json_encode(Empresa::obtenerEmpresa($id_Empresa));



?>
