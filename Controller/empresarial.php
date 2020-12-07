<?php

require_once('../Model/Usuario.php');

$obj= new Usuario();
$searchParam = $_POST['searchParam'];
echo Usuario::empresarial($searchParam);

?>
