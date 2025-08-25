<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "sistema";

//conexion a la base del datos

try{
    $conexion = new PDO("mysql:host=$servidor;dbname=$bd", $usuario, $password);
    
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión exitosa a la base de datos";

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit();
}




?>