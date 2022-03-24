<?php include("template/header.php");
include 'admin/conexion.php';
// Instanciamos de la clase conexión, un objeto llamado conexión para poder hacer las consultas a la base de datos.
$conexion = new conexion();
$alumnos = $conexion->listar("SELECT * FROM `tbl_ada_prueba_alumnos`");

$ciudadSeleccionada = "";
$codigoCiudad = "";

if ($_POST) {
    $ciudadSeleccionada = (isset($_POST['ciudadSeleccionada'])) ? $_POST['ciudadSeleccionada'] : "";



    $alumnos = $conexion->listar("SELECT * FROM `tbl_ada_prueba_alumnos` WHERE `ID_ciudad` = '$ciudadSeleccionada';");
}



?>

<div class="container">
<div class="row">
<!--FORMULARIO CONSULTA, DEPARTAMENTO Y CIUDAD-->
            <form action="index.php" method="post">


                Por favor seleccione la ciudad a consultar: <br />
                <select name="ciudadSeleccionada" id="">
                    <option value="">Seleccione una ciudad...</option>
                    <?php foreach ($ciudades as $ciudad) { ?>
                        <option value='<?php print_r($ciudad->c_digo_dane_del_municipio); ?>'> <?php print_r($ciudad->c_digo_dane_del_municipio . " - " . $ciudad->municipio); ?> </option>
                    <?php }; ?>
                </select>
                <br />
                <br />
                <button type="submit"> Consultar Ciudad </button>
            </form>
            <br />
            <br />

            <!--TABLA DE ALUMNOS-->
            <table class="table">
                <thead>
                    <h3>TABLA DE ALUMNOS </h3>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Edad</th>
                        <th>Creado</th>
                        <th>Actualizado</th>
                        <th>Ciudad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alumnos as $alumno) { ?>
                        <tr>
                            <td><?php echo $alumno['ID']; ?></td>
                            <td><?php echo $alumno['NOMBRE']; ?></td>
                            <td><?php echo $alumno['APELLIDO']; ?></td>
                            <td><?php echo $alumno['EMAIL']; ?></td>
                            <td><?php echo $alumno['EDAD']; ?></td>
                            <td><?php echo $alumno['CREATED_AT']; ?></td>
                            <td><?php echo $alumno['UPDATE_AT']; ?></td>
                            <td><?php echo $alumno['ID_CIUDAD']; ?></td>
                        </tr>
                    <?php }; ?>
                </tbody>
            </table>
    </div>
</div>

 <?php include("template/footer.php"); ?>