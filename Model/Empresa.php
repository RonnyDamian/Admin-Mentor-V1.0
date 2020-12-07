
<?php
require_once ('../config/Conexion.php');
error_reporting(0);
class  Empresa extends  Conexion{

    public static function addEmpresa($data){

        $sql = "INSERT INTO t_empresa
                VALUES(null,?,?,?,?,?,?,now())";
        $sql=Conexion::conectar()->prepare($sql);
        $sql->bindValue(1,$data['empresa'],PDO::PARAM_STR);
        $sql->bindValue(2,$data['negocio'],PDO::PARAM_STR);
        $sql->bindValue(3,$data['claveRegistro'],PDO::PARAM_STR);
        $sql->bindValue(4,$data['ubicacion'],PDO::PARAM_STR);
        $sql->bindValue(5,$data['email'],PDO::PARAM_STR);
        $sql->bindValue(6,$data['contacto'],PDO::PARAM_STR);

        $response=$sql->execute();
        return $response;
   }

   public static  function obtenerEmpresa($id_Empresa){

        $sql="SELECT * FROM t_empresa WHERE id_Empresa=?";
        $sql=Conexion::conectar()->prepare($sql);
        $sql->bindValue(1,$id_Empresa,PDO::PARAM_INT);
        $sql->execute();
        $response=$sql->fetch();
        return $response;
   }

    function editarEmpresa($data){

        $sql = "UPDATE t_empresa SET
                    empresa=?,
                    giro=?,
                    claveRegistro=?,
                    ubicacion=?,
                    email=?,
                    contacto=?  
                    WHERE id_Empresa=?";
        $sql=Conexion::conectar()->prepare($sql);
        $sql->bindValue(1,$data['empresa'],PDO::PARAM_STR);
        $sql->bindValue(2,$data['negocio'],PDO::PARAM_STR);
        $sql->bindValue(3,$data['claveRegistro'],PDO::PARAM_STR);
        $sql->bindValue(4,$data['ubicacion'],PDO::PARAM_STR);
        $sql->bindValue(5,$data['email'],PDO::PARAM_STR);
        $sql->bindValue(6,$data['contacto'],PDO::PARAM_STR);
        $sql->bindValue(7,$data['id_Empresa'],PDO::PARAM_INT);
        $response=$sql->execute();

        return $response;
   }
   public  function mostrarEmpresa(){
        $sql="SELECT * FROM t_empresa";
        $sql=Conexion::conectar()->prepare($sql);
        $sql->execute();
        $response=$sql->fetchAll(PDO::FETCH_ASSOC);
        return $response;
   }
   public static function eliminarEmpresa($id_Empresa){
        $sql="DELETE FROM t_empresa WHERE id_Empresa=?";
        $sql=Conexion::conectar()->prepare($sql);
        $sql->bindValue(1,$id_Empresa,PDO::PARAM_INT);
        $response=$sql->execute();
        return $response;
   }
   public static function validaEmpresa($data){
        $sql="SELECT empresa, email FROM t_empresa WHERE empresa=? OR email=?";
        $sql=Conexion::conectar()->prepare($sql);
        $sql->bindValue(1, $data['empresa'],PDO::PARAM_STR);
        $sql->bindValue(2, $data['email'], PDO::PARAM_STR);
        $sql->execute();
        $response=$sql->fetch();
        return $response;
   }
}

?>
