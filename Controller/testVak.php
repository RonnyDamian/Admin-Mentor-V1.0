<?php

 require_once("../Model/TestVak.php");
 $obj=new TestVak();
$searchParam = $_POST['searchParam'];

if($searchParam==1){
    echo $obj->vak($searchParam);
}elseif ($searchParam==2){
    echo $obj->filtraFecha($searchParam);
}
?>
