<?php
$servidor = "sql104.infinityfree.com";      // MySQL Host Name
$usuario = "if0_39789672";                  // MySQL User Name
$password = "WYefInYxyb";                   // MySQL Password
$bd = "if0_39789672_sistema";               // MySQL DB Name

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$bd", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexión exitosa"; // opcional para probar
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit();
}
?>