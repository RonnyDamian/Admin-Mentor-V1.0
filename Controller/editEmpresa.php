<?php

require_once ('../Model/Empresa.php');
$obj = new Empresa();
$data=array(
    "empresa"=>$_POST['empresau'],
    'negocio'=>$_POST['negociou'],
    "ubicacion"=>$_POST['ubicacionu'],
    "email"=>$_POST['emailu'],
    "contacto"=>$_POST['contactou'],
    "claveRegistro"=>$_POST['claveRegistrou'],
    "id_Empresa"=>$_POST['id_Empresa']
);

$data['empresa']=strtoupper($data['empresa']);

echo $obj->editarEmpresa($data);



?>
