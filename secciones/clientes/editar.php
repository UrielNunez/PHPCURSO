<?php
//print_r($_POST); // Debugging line to check POST data
include("editar_.php");
?>
<?php
include '../../template/header.php'; // Include the header template
?>
<div class="card" style="max-width: 550px; height: 600px; margin: auto;">
    <div class="card-header"></div>
    <!-- Botón X en la esquina -->
    <a href="index.php" class="btn-close position-absolute top-0 end-0 m-2"></a>

    <div class="card-body">
        <h4 class="card-title">Actualizar Cliente</h4>
        <p class="card-text">

        <form action="" method="post" enctype="multipart/form-data">

            <div class="row mb-3" style=" padding: 2px;">
                <div class="col-md-5">
                    <label for="" class="form-label">ID</label>
                    <input type="text" class="form-control form-control-sm" name="id" id="id"
                        placeholder="ID del Cliente" readonly required value="<?php echo $id; ?>" />
                </div>

                <div class="col-md-7 text-end" id="foto_actual" style = "height: 10px;">
                    <img class="img-thumbnail" src="<?php echo $foto; ?>" alt="Foto del Cliente" style="width: 90px;  border-radius: 8px; position: relative; top: -30px;">
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control form-control-sm" name="nombre" id="nombre"
                    placeholder="Nombre del Cliente" required value="<?php echo $nombre; ?>" />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Correo</label>
                <input type="email" class="form-control form-control-sm" name="correo" id="correo" placeholder="Correo"
                    required value="<?php echo $correo; ?>" />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Direccion</label>
                <input type="text" class="form-control form-control-sm" name="direccion" id="direccion"
                    placeholder="Direccion" required value="<?php echo $direccion; ?>" />
            </div>
            <div class="mb-3">

                <label for="" class="form-label">Foto</label>
                <input type="file" class="form-control form-control-sm" name="foto" id="foto"
                    placeholder="Foto del Cliente" accept="image/*" />
            </div>
            <button class="btn btn-success" style="margin-left: 180px; margin-top: 35px;" type="submit"
                name="actualizar_cliente">Actualizar Cliente</button>
            <!--<a class="btn btn-warning" style="margin-left: 50px; margin-top: 35px;" href="index.php">x</a>-->
        </form>
        </p>
    </div>
</div>

<?php
include '../../template/footer.php'; // Include the footer template
?>