<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
include("../../template/header.php"); // Include the header template
include("eliminar_.php"); // Include the delete functionality
?>


<?php if (isset($_GET['mensaje'])) { ?>
    <div class="toast-container position-fixed top-40 start-50 translate-middle p-3">
        <div class="toast align-items-center text-bg-success border-0 fade show" role="alert" aria-live="assertive"
            aria-atomic="true" data-bs-delay="3000" data-bs-autohide="true">
            <div class="d-flex">
                <div class="toast-body">
                    <strong>Mensaje:</strong> <?php echo $_GET['mensaje']; ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var toastElList = [].slice.call(document.querySelectorAll('.toast'))
            var toastList = toastElList.map(function (toastEl) {
                return new bootstrap.Toast(toastEl)
            })
            toastList.forEach(toast => toast.show());
        });
    </script>
<?php } ?>


<h1>Lista de Clientes</h1>
<br>
<a class="btn btn-success" href="crear.php">Crear Cliente</a>
<br>
<br>

<div class="table-responsive">
    <table class="table table-Light table-bordered border-dark table-hover" id="myTable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Direccion</th>
                <th scope="col">Foto</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista_tbl_clientes as $cliente): ?>
                <tr>

                    <td class="text-center"><?php echo $cliente['ID']; ?></td>

                    <td><?php echo $cliente['nombre']; ?></td>
                    <td><?php echo $cliente['correo']; ?></td>
                    <td><?php echo $cliente['direccion']; ?></td>
                    <td class="text-center">
                        <img class="img-thumbnail" src="<?php echo $cliente['foto']; ?>" alt="Foto del Cliente"
                            style="width: 100px;">
                    </td>

                    <td class="align-middle text-center">
                        <div class="d-inline-flex gap-2">
                            <a class="btn btn-warning" href="#" data-bs-toggle="modal"
                                data-bs-target="#editarModal<?php echo $cliente['ID']; ?>">Editar</a>
                            <!--<a class="btn btn-warning" href="editar.php?id=<?php echo $cliente['ID']; ?>">Editar</a>-->
                            <a class="btn btn-danger" href="eliminar_.php?id=<?php echo $cliente['ID']; ?>">Eliminar</a>
                        </div>
                    </td>

                </tr>

                <!-- Modal Editar Cliente -->
                <div class="modal fade" id="editarModal<?php echo $cliente['ID']; ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Actualizar Cliente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                            </div>

                            <div class="modal-body">
                                <form action="editar_.php" method="post" enctype="multipart/form-data">

                                    <div class="row mb-3" style=" padding: 2px;">
                                        <div class="col-md-5">
                                            <input type="hidden" name="id" value="<?php echo $cliente['ID']; ?>">
                                        </div>

                                        <div class="col-md-7 text-end" id="foto_actual" style="height: 10px;">
                                            <img class="img-thumbnail" src="<?php echo $cliente['foto']; ?>" alt="Foto del Cliente"
                                                style="width: 100px; border-radius: 8px; margin-right: 0.5px;">
                                        </div>
                                    </div>


                                    
                                    <div class="mb-3">
                                        <label class="form-label">Nombre</label>
                                        <input type="text" class="form-control w-75" name="nombre"
                                            value="<?php echo $cliente['nombre']; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Correo</label>
                                        <input type="email" class="form-control w-75" name="correo"
                                            value="<?php echo $cliente['correo']; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Dirección</label>
                                        <input type="text" class="form-control w-75" name="direccion"
                                            value="<?php echo $cliente['direccion']; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <input type="file" class="form-control mt-2" name="foto" accept="image/*">
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" name="actualizar_cliente" class="btn btn-success">Guardar
                                            Cambios</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Fin Modal Editar Cliente -->
            <?php endforeach; ?>
        </tbody>
    </table>
</div>




<?php
include("../../template/footer.php"); // Include the header template
?>