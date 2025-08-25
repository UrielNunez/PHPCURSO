<?php
//print_r($_POST); // Debugging line to check POST data
include("crear_.php");
?>
<?php
include '../../template/header.php'; // Include the header template
?>

<br>

<div class="card" style="max-width: 500px; height: 500px; margin: auto;">
    <div class="card-header">
        <h4 class="modal-title">Datos del Cliente</h4>
        <!-- Botón X en la esquina -->
        <a href="index.php" class="btn-close position-absolute top-0 end-0 m-2"></a>
    </div>

    <div class="card-body">



        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control form-control-sm" name="nombre" id="nombre"
                    placeholder="Nombre del Cliente" required />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Correo</label>
                <input type="email" class="form-control form-control-sm" name="correo" id="correo" placeholder="Correo"
                    required />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Direccion</label>
                <input type="text" class="form-control form-control-sm" name="direccion" id="direccion"
                    placeholder="Direccion" required />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Foto:</label>
                <input type="file" class="form-control form-control-sm" name="foto" id="foto"
                    placeholder="Foto del Cliente" accept="image/*" required />
            </div>
            <button class="btn btn-success" style="margin-left: 150px; margin-top: 35px;" type="submit"
                name="crear_clientes"> Dar de Alta Cliente</button>
            <!--<a class="btn btn-warning" style="margin-left: 50px; margin-top: 35px;" href="index.php">x</a>-->
        </form>

        </p>
    </div>
</div>




<?php
include '../../template/footer.php'; // Include the footer template
?>