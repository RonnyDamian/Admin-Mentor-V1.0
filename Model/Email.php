<?php

require_once ("../config/Conexion.php");
class  Email extends Conexion{

    public   function validaEmail($email){
         $sql = "SELECT email FROM t_admin WHERE email = ?";
         $sql = Conexion::conectar()->prepare($sql);
         $sql->bindValue(1, $email, PDO::PARAM_STR);
         $sql->execute();
         $response = $sql->fetch();
         //Conexion::closeConnection($sql);
         return $response;
    }

    public function restableceClave($data){
      $sql = "UPDATE t_admin SET clave=? WHERE email=?";
      $sql =Conexion::conectar()->prepare($sql);
      $sql->bindValue(1, $data['clave'], PDO::PARAM_STR);
      $sql->bindValue(2, $data['email'], PDO::PARAM_STR);
      $query=$sql->execute();
      return $query;
    }

}

?>
