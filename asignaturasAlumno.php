<?php
include 'conexion.php';

$con = new conexion();
$idEstudiante = (isset($_POST['ID'])) ? $_POST['ID'] : "";
//echo $idEstudiante;

$consulta = $con->listar("SELECT * FROM tbl_ada_prueba_matriculas JOIN tbl_ada_prueba_asignaturas ON tbl_ada_prueba_matriculas.ID_ASIGNATURA = tbl_ada_prueba_asignaturas.ID WHERE tbl_ada_prueba_matriculas.ID_ALUMNO = '$idEstudiante';");
//print_r( $consulta); // Para ver lo que no está trayendo la consulta

?>

<h2>CONSULTAR ASIGNATURAS DEL ALUMNO POR ID</h2>
<br />
<br />
<form action="asignaturasAlumno.php" method="post">
    Digite el ID del estudiante a consultar: <input required type="text" name="ID" id="">
    <br />
    <button type="submit">Consultar</button>
</form>
<br />
<br />
LAS ASIGNATURAS DEL ALUMNO SON:
<?php foreach ($consulta as $consul) { ?>
    <li> <?php print_r($consul[6]); ?> </li>
<?php }; ?>