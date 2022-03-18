<?php include 'admin/api_ciudad_departamento.php';
include 'admin/conexion.php';


// Instanciamos de la clase conexión, un objeto llamado conexión para poder hacer las consultas a la base de datos.
$conexion = new conexion();
//print_r($conexion);
$alumnos = $conexion->listar("SELECT * FROM `tbl_ada_prueba_alumnos`");
$asignaturas = $conexion->listar("SELECT * FROM `tbl_ada_prueba_asignaturas`");

# ESBILIDAD DE LA OPCIONES SELECCIONADAS
$ciudadSeleccionada = "";
$codigoCiudad = "";

if ($_POST) {
    //print_r($_POST);
    $ciudadSeleccionada = (isset($_POST['ciudadSeleccionada'])) ? $_POST['ciudadSeleccionada'] : "";

    //echo "CIUDAD SELECCIONADA: ". $ciudadSeleccionada;
    //$codigoCiudad = explode(" ", $ciudadSeleccionada);


    //$codigoCiudad =str_replace($ciudadSeleccionada, ".", "");
    //print_r( $codigoCiudad[0]);
    $alumnos = $conexion->listar("SELECT * FROM `tbl_ada_prueba_alumnos` WHERE `ID_ciudad` = '$ciudadSeleccionada';");
    $asignaturas = $conexion->listar("SELECT * FROM `tbl_ada_prueba_asignaturas`");
}
?>


<?php include ("template/header.php")?>
<div class="container">

    <div class="row">


        <div class="jumbotron">
            <h1 class="display-3">INSTITUTO ACV</h1>
            <p class="lead">BIENVENIDO</p>
            <p>Consultar estudiantes por ciudad</p>
            <hr class="my-2">



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
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

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
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <br />
            <br />

            <a href="asignaturasAlumno.php">Consultar asignaturas por alumno</a>



        </div>

<?php include ("template/footer.php")?>    