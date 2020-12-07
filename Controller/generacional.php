<?php

 require_once("../Model/Generacional.php");
 $obj=new Generacional();
$searchParam = $_POST['searchParam'];

if($searchParam==1){
    echo $obj->show($searchParam);
}else if($searchParam==2){
    echo $obj->filtraFecha($searchParam);
}

?>