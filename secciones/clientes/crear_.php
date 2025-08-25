<?php
//print_r($_POST); // Debugging line to check POST data

include("../../bd.php"); //incluimos la base de datos

if (isset($_POST['crear_clientes'])) {
    
    $nombre = (isset($_POST['nombre']) ?  $_POST['nombre'] : ''); //IF TERNARIO
    $correo = (isset($_POST['correo']) ?  $_POST['correo'] : ''); //IF TERNARIO
    $direccion = (isset($_POST['direccion']) ?  $_POST['direccion'] : ''); //IF TERNARIO
    $foto = (isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : ''); //IF TERNARIO

    $fechaFoto = new DateTime();
    $nombreFoto =($foto!='') ? $fechaFoto->getTimestamp() . "_" . $_FILES['foto']['name'] : 'noimagen.jpg';

    $tmp_nombre = $_FILES['foto']['tmp_name'];
    if (isset($tmp_nombre) && $tmp_nombre != '') {
        move_uploaded_file($tmp_nombre, "./" . $nombreFoto);
    }

    $sentencia = $conexion->prepare("INSERT INTO tbl_clientes(nombre, correo, direccion, foto) 
    VALUES(:nombre, :correo, :direccion, :foto)");

    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':correo', $correo);
    $sentencia->bindParam(':direccion', $direccion);
    $sentencia->bindParam(':foto', $nombreFoto);
    $resultado = $sentencia->execute();
    if ($resultado) {
        $mensaje="Cliente Agregado Correctamente";
    } else {
        $mensaje="Error al crear cliente";  
    } 

    header("Location: index.php?mensaje=".$mensaje); // Redirigir a la página de clientes después de crear


}
?>