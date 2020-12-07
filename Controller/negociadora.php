<?php

 require_once("../Model/Negociadora.php");
 $obj=new Negociadora();
$searchParam = $_POST['searchParam'];

if($searchParam==1){
   echo $obj->maker($searchParam);
}elseif($searchParam==2){
    echo $obj->filtraFecha($searchParam);
}

?>
