<?php

require_once("../Model/Parametro.php");
$obj= new Parametro();

$searchParam = $_POST['searchParam'];

echo json_encode(Parametro::llenaTabla($searchParam));

?>
