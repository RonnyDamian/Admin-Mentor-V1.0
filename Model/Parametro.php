 <?php
 require_once("../config/Conexion.php");
error_reporting(0);


 class Parametro extends Conexion{


     public function mostrarParametros(){
         $sql="SELECT
                     idParametro,
                     CONCAT('$',tarifa) as TARIFA,
                     CONCAT('$',valorRiego) as VALOR_RIEGO,
                     CONCAT('$',multaSesion) as MULTA_SESION,
                     CONCAT('$',multaMinga) as MULTA_MINGA,
                     CONCAT('$',valorMora) as VALOR_MORA  
                    FROM t_parametros";
         $sql=Conexion::conectar()->prepare($sql);
         $sql->execute();
         $query=$sql->fetchAll();
         return $query;
     }
     public static function obtenerParametros($idParametro){
         $sql="SELECT * FROM t_parametros WHERE idParametro=?";
         $sql=Conexion::conectar()->prepare($sql);
         $sql->bindValue(1,$idParametro, PDO::PARAM_INT);
         $sql->execute();
         $query=$sql->fetch();
         return $query;
     }

     public static function llenaTabla($searchParam){
         $sql="SELECT * FROM t_parametros WHERE tarifa=?";
         $sql=Conexion::conectar()->prepare($sql);
         $sql->bindValue(1,$searchParam, PDO::PARAM_INT);
         $sql->execute();
         $query=$sql->fetch();
         return $query;
     }

     public function editarParametros($data){

         $sql="UPDATE t_parametros
               SET tarifa=?,
                  valorRiego=?,
                  multaSesion=?,
                  multaMinga=?,                  
                  valorMora=?                  
              WHERE 
                  idParametro=?";
         $sql=Conexion::conectar()->prepare($sql);
         $sql->bindValue(1, $data['tarifa'], PDO::PARAM_STR);
         $sql->bindValue(2, $data['valorRiego'], PDO::PARAM_STR);
         $sql->bindValue(3, $data['multaSesion'], PDO::PARAM_STR);
         $sql->bindValue(4, $data['multaMinga'], PDO::PARAM_STR);
         $sql->bindValue(5, $data['valorMora'], PDO::PARAM_STR);
         $sql->bindValue(6, $data['idParametro'], PDO::PARAM_INT);
         $query=$sql->execute();
         return $query;
     }



 }

 ?>