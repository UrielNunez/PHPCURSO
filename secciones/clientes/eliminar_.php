<?php
    include("../../bd.php"); //incluimos la base de datos

    $sentencia = $conexion->prepare("SELECT * FROM tbl_clientes");
    $sentencia->execute();
    $lista_tbl_clientes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    //print_r($lista_tbl_clientes);

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $sentencia = $conexion->prepare("SELECT foto FROM tbl_clientes WHERE ID = :ID");
        $sentencia->bindParam(':ID', $id);
        $sentencia->execute();
        $registro_foto = $sentencia->fetch(PDO::FETCH_LAZY);
        //print_r($registro_foto);
        if(isset($registro_foto["foto"]) && $registro_foto["foto"] != "") {
            // Verificar si la foto existe antes de intentar eliminarla
            if (file_exists("./" . $registro_foto["foto"])) {
                unlink("./" . $registro_foto["foto"]); // Eliminar la foto del servidor
            }
        }
        // Eliminar el registro de la base de datos
        $sentencia = $conexion->prepare("DELETE FROM tbl_clientes WHERE ID = :ID");
        $sentencia->bindParam(':ID', $id);
        $sentencia->execute();
        header("Location: index.php"); // Redirigir a la lista de clientes después de eliminar
        
    }
?>