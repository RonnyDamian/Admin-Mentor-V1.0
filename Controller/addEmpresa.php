<?php

require_once ('../Model/Empresa.php');
$obj = new Empresa();
$data=array(
    "empresa"=>$_POST['empresa'],
    'negocio'=>$_POST['negocio'],
    "ubicacion"=>$_POST['ubicacion'],
    "email"=>$_POST['email'],
    "contacto"=>$_POST['contacto'],
    "claveRegistro"=>$_POST['claveRegistro']
);

$data['empresa']=strtoupper($data['empresa']);

$result=$obj->validaEmpresa($data);
if(is_array($result)==true AND count($result)>0){
    echo 2;
}else{
    echo Empresa::addEmpresa($data);
}
?>
