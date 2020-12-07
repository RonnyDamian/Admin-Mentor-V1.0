<?php

 require_once("../Model/TiposCerebro.php");
 $obj=new TiposCerebro();
$searchParam = $_POST['searchParam'];

if($searchParam==1){
  echo $obj->typeMind($searchParam);
}elseif ($searchParam==2){
    echo $obj->filtraFecha($searchParam);
}

?>
