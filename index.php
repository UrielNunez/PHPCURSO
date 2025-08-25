<?php
include 'template/header.php'; // Include the header template
?>

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Bienvenido</h1>
        <p class="col-md-8 fs-4">
            Aplicacion de CRUD Basico con PHP y MySQL
            para la gestion de clientes.
        </p>
        <a class="btn btn-primary btn-lg" href="<?php echo $url_base; ?>secciones/clientes/">
            Gestionar Clientes
        </a>
    </div>
</div>

<?php
include 'template/footer.php'; // Include the footer template
?>