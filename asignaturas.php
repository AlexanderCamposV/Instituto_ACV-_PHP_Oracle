<?php include("template/header.php");
include 'admin/conexion.php';
$conexion = new conexion();

$asignaturas = $conexion->listar("SELECT * FROM `tbl_ada_prueba_asignaturas`");



?>

<div class="container">

    <div class="col-md-5">
        <div class="card">
            <!--LISTA DE ASIGNATURAS DISPONIBLES-->
            <table class="table">
                <thead>
                    <h3>ASIGNATURAS DISPONIBLES</h3>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Créditos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($asignaturas as $asignatura) { ?>
                        <tr>
                            <td><?php echo $asignatura['ID']; ?></td>
                            <td><?php echo $asignatura['NOMBRE']; ?></td>
                            <td><?php echo $asignatura['CREDITOS']; ?></td>
                        </tr>
                    <?php }; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<?php include("template/footer.php"); ?>