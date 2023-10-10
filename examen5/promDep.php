<?php
include "conexion.inc.php";
session_start();

$idcol = $_SESSION["usuario"];
$colorr = mysqli_query($con, "SELECT color FROM docentes WHERE ciD ='$idcol'");
$registrocolor = mysqli_fetch_array($colorr);
$datocolor = $registrocolor[0];

// Realiza una consulta para obtener los datos de promedios por departamento
if (isset($_GET["bandera"]))
{
	
	$bandera="promedioDep";
    $sigla=$_GET["sigla"];
	$ci=$_GET["ci"];
$query = "
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
WHERE inscripcion.materia_id = '$sigla'";
}

$resultado = mysqli_query($con, $query);
$registro = mysqli_fetch_assoc($resultado);

// Inicializa un array para almacenar los resultados
$promediosPorDepartamento = array(
    "la paz"=>$registro["LaPaz"],
    "cochabamba"=>$registro["Cochabamba"],
    "santa cruz"=>$registro["Santacruz"],
    "beni"=>$registro["beni"],
    "pando"=>$registro["pando"],
    "tarija"=>$registro["tarija"],
    "chuquisaca"=>$registro["chuquisaca"],
    "oruro"=>$registro["oruro"],
    "sucre"=>$registro["sucre"]

);
// Llena el array con los resultados de la consulta



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <title>Inscripciones</title>
</head>
<body style="background-color: <?php echo $datocolor; ?>">
    <section class="section-book">
        <br>
        <table>
            <tr>
                <th>Departamento</th>
                <td>La Paz</td>
                <td>Cochabamba</td>
                <td>Santa Cruz</td>
                <td>Beni</td>
                <td>Pando</td>
                <td>Tarija</td>
                <td>Chuquisaca</td>
                <td>Oruro</td>
                <td>Sucre</td>
            </tr>
            <tr>
                <th>Promedio</th>
                <?php
                echo "<td>{$promediosPorDepartamento['la paz']}</td>";
                echo "<td>{$promediosPorDepartamento['cochabamba']}</td>";
                echo "<td>{$promediosPorDepartamento['santa cruz']}</td>";
                echo "<td>{$promediosPorDepartamento['beni']}</td>";
                echo "<td>{$promediosPorDepartamento['pando']}</td>";
                echo "<td>{$promediosPorDepartamento['tarija']}</td>";
                echo "<td>{$promediosPorDepartamento['chuquisaca']}</td>";
                echo "<td>{$promediosPorDepartamento['oruro']}</td>";
                echo "<td>{$promediosPorDepartamento['sucre']}</td>";
                             
                ?>

            </tr>
           
        </table>
        <button onclick="window.location.href='docente.php'">Volver</button>
    </section>
</body>
</html>
