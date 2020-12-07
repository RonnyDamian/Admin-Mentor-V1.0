<?php
session_start();
  require_once("../Model/Email.php");
  $obj = new Email();
  $email = isset($_POST['email'])? $_POST['email']:'';

  $result = $obj->validaEmail($email);

  if(is_array($result)==true AND count($result)>0){
    $_SESSION['email']=$email;
  echo 1;
  }else{
    echo 2;
  }

?>
