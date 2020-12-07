<?php
session_start();
  require_once("../Model/Email.php");
  $obj = new Email();

    $data = array(
        "clave"=>$_POST['clave'],
        "email"=>$_POST['email']
    );

  $result = $obj->restableceClave($data);
  echo $result;
  die();
?>
