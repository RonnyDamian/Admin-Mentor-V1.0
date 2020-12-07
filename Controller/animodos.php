<?php

 require_once("../Model/Animodo.php");
 $obj=new Animodo();
$searchParam = $_POST['searchParam'];

if($searchParam==2){
    echo $obj->filtraFecha($searchParam);
}

?>
