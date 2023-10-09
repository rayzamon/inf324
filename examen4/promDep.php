<?php
     include "conexion.inc.php";
     session_start();
   
$idcol = $_SESSION["usuario"];
$colorr = mysqli_query($con, "SELECT color FROM docentes WHERE ciD ='$idcol'");
$registrocolor=mysqli_fetch_array($colorr);
$datocolor=$registrocolor[0];
   ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

    <!--<link rel="stylesheet" href="css/icon-font.css">-->

    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">

    <title>Inscripciones</title>
</head>

<?php
echo "<body style='background-color: $datocolor;'>";
?>
<section class="section-book">
<br>       
<table>
	<tr>
<td>LaPaz</td>
<td>Cochabamba</td>
<td>santa cruz</td>
<td>beni</td>
<td>pando</td>
<td>tarija</td>
<td>chuquisaca</td>
<td>oruro</td>
<td>sucre</td>
	</tr>
<?php
include "conexion.inc.php";


if (isset($_GET["bandera"]))
{
	
	$bandera="promedioDep";
    $sigla=$_GET["sigla"];
	$ci=$_GET["ci"];
	
/*
    $resultado=mysqli_query($con, "select * from alumno where ci='$ci'");
	$registro=mysqli_fetch_array($resultado);
	$ci=$registro['ci'];
	$nombre=$registro['nombre'];
	$paterno=$registro['paterno'];*/

    $resultado=mysqli_query($con, "
SELECT

    (SUM(CASE WHEN estudiantes.depto = 'la paz' THEN inscripcion.promedios ELSE 0 END) /
    (SELECT COUNT(*) FROM estudiantes WHERE depto = 'la paz')) AS LaPaz,

    (SUM(CASE WHEN estudiantes.depto = 'cochabamba' THEN inscripcion.promedios ELSE 0 END) /
    (SELECT COUNT(*) FROM estudiantes WHERE depto = 'cochabamba')) AS Cochabamba,

    (SUM(CASE WHEN estudiantes.depto = 'santa cruz' THEN inscripcion.promedios ELSE 0 END) /
    (SELECT COUNT(*) FROM estudiantes WHERE depto = 'santa cruz')) AS Santacruz,
    
    (SUM(CASE WHEN estudiantes.depto = 'beni' THEN inscripcion.promedios ELSE 0 END) /
    (SELECT COUNT(*) FROM estudiantes WHERE depto = 'beni')) AS beni,

    (SUM(CASE WHEN estudiantes.depto = 'pando' THEN inscripcion.promedios ELSE 0 END) /
    (SELECT COUNT(*) FROM estudiantes WHERE depto = 'pando')) AS pando,

    (SUM(CASE WHEN estudiantes.depto = 'tarija' THEN inscripcion.promedios ELSE 0 END) /
    (SELECT COUNT(*) FROM estudiantes WHERE depto = 'tarija')) AS tarija,

    (SUM(CASE WHEN estudiantes.depto = 'chuquisaca' THEN inscripcion.promedios ELSE 0 END) /
    (SELECT COUNT(*) FROM estudiantes WHERE depto = 'chuquisaca')) AS chuquisaca,
    
    (SUM(CASE WHEN estudiantes.depto = 'oruro' THEN inscripcion.promedios ELSE 0 END) /
    (SELECT COUNT(*) FROM estudiantes WHERE depto = 'oruro')) AS oruro,

    (SUM(CASE WHEN estudiantes.depto = 'sucre' THEN inscripcion.promedios ELSE 0 END) /
    (SELECT COUNT(*) FROM estudiantes WHERE depto = 'sucre')) AS sucre

FROM estudiantes
INNER JOIN inscripcion ON estudiantes.ci = inscripcion.estudiante_id
INNER JOIN materia ON inscripcion.materia_id = materia.sigla
WHERE inscripcion.materia_id = '$sigla';");
    while($registro=mysqli_fetch_array($resultado))
    {
        echo "<tr>";
        echo "<td>".$registro["LaPaz"]."</td>";
        echo "<td>".$registro["Cochabamba"]."</td>";
        echo "<td>".$registro["Santacruz"]."</td>";
        echo "<td>".$registro["beni"]."</td>";
        echo "<td>".$registro["pando"]."</td>";
        echo "<td>".$registro["tarija"]."</td>";
        echo "<td>".$registro["chuquisaca"]."</td>";
        echo "<td>".$registro["oruro"]."</td>";
        echo "<td>".$registro["sucre"]."</td>";
        echo "</tr>";
    }
    
}

?>
</table>
<button onclick="window.location.href='docente.php'">Volver</button></section>

</body>
</html>
