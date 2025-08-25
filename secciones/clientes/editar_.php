<?php
include("../../bd.php"); //incluimos la base de datos
//print_r($_GET); // Debugging line to check POST data

if (isset($_GET['id'])) {

    $id = (isset ($_GET['id']) ? $_GET['id'] : 0);
    $sentencia = $conexion->prepare("SELECT * FROM tbl_clientes WHERE id = :id");
    $sentencia->bindParam(':id', $id);
    $sentencia->execute();
    $cliente = $sentencia->fetch(PDO::FETCH_LAZY);

    //print_r($cliente); // Debugging line to check the fetched client data

    if ($cliente) {
        // Si el cliente existe, puedes proceder a editarlo
        $nombre = $cliente['nombre'];
        $correo = $cliente['correo'];
        $direccion = $cliente['direccion'];
        $foto = $cliente['foto'];
    } else {
        echo "Cliente no encontrado.";
        exit;
    }

} 
if(isset($_POST['actualizar_cliente'])) {
    
    $id = (isset($_POST['id']) ?  $_POST['id'] : ''); //IF TERNARIO
    $nombre = (isset($_POST['nombre']) ?  $_POST['nombre'] : ''); //IF TERNARIO
    $correo = (isset($_POST['correo']) ?  $_POST['correo'] : ''); //IF TERNARIO
    $direccion = (isset($_POST['direccion']) ?  $_POST['direccion'] : ''); //IF TERNARIO

    $foto = (isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : ''); //IF TERNARIO

    $sentencia = $conexion->prepare("UPDATE tbl_clientes 
    SET nombre = :nombre, 
        correo = :correo, 
        direccion = :direccion 
    WHERE id = :id");
    $sentencia->bindParam(':id', $id);
    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':correo', $correo);
    $sentencia->bindParam(':direccion', $direccion);
    $resultado = $sentencia->execute();

    $tmp_foto = $_FILES['foto']['tmp_name'];
    if ($tmp_foto != '') {
        $fechaFoto = new DateTime();
        $nombreFoto = ($foto != '') ? $fechaFoto->getTimestamp() . "_" . $_FILES['foto']['name'] : 'noimagen.jpg';
        move_uploaded_file($tmp_foto, "./" . $nombreFoto);

        $sentencia = $conexion->prepare("SELECT foto FROM tbl_clientes WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();
        $cliente = $sentencia->fetch(PDO::FETCH_LAZY);
        
        if($cliente && $cliente['foto'] != 'noimagen.jpg') {
            // Verificar si la foto existe antes de intentar eliminarla
            if (file_exists("./" . $cliente["foto"])) {
                unlink("./" . $cliente["foto"]); // Eliminar la foto del servidor
            }
        }
        $sentencia = $conexion->prepare("UPDATE tbl_clientes SET foto = :foto WHERE id = :id");
        $sentencia->bindParam(':foto', $nombreFoto);
        $sentencia->bindParam(':id', $id);
        $resultado = $sentencia->execute();
    }
    $mensaje="Cliente Actualizado Correctamente";
    header("Location: index.php?mensaje=".$mensaje); // Redirigir a la página de clientes después de actualizar

    

}
?>