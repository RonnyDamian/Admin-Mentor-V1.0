<?php

class Conexion{

     public function conectar(){
          define("HOST","localhost");
          define('DBNAME','pryencuesta');
          define('USERNAME', 'root');
          define('PASSWORD','12345');
         try {
             $connectionString="mysql:host=".HOST. ";dbname=". DBNAME .";charset=utf8";
             $conexion = new PDO($connectionString, USERNAME, PASSWORD);
             $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             return $conexion;
         }catch(PDOException $exception){
            echo "Error de conexión: ". $exception->getMessage() ."<br>";
            echo "Error en la linea:" .$exception->getLine();
            die();
         }

     }

}


?>
