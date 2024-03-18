<?php 

header('Acess-Control-Allow-Origin:*');
header('Content-type: application/json');

class Conectar{
    public function Conectar(){
            try{
                $servename = "localhost";
                $username = "root";
                $password = "";
                $database = "bdm";

                $conexion = new mysqli($servename, $username, $password, $database);
            }
            catch(Exception $error){
                    die ("Error al conectar" . $error->getMessage());
            }

            return $conexion;

    }
}




?>