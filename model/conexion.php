<?php
    class conexion{
        public function get_conexion(){
            $user = "root";
            $pass = "";
            $host = "localhost";
            $db = "proyectotds";

            $conexion = new PDO("mysql: host=$host; dbname=$db", $user, $pass);
            return $conexion;
        }
    }


?>