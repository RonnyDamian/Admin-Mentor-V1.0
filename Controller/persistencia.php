<?php

 require_once("../Model/Persistencia.php");
 $obj=new Persistencia();
$searchParam = $_POST['searchParam'];

if($searchParam==1){
    echo $obj->persistence($searchParam);
}elseif ($searchParam==2){
    echo $obj->filtraFecha($searchParam);
}

?>
