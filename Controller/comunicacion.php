<?php

 require_once("../Model/Comunicacion.php");
 $obj=new Comunicacion();
$searchParam = $_POST['searchParam'];

if($searchParam==1){
    echo $obj->comunication($searchParam);
}elseif($searchParam==2) {
    echo $obj->filtraFecha($searchParam);
}

?>
