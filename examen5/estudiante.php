<?php
     include "conexion.inc.php";
     session_start();
    // $colorantiguo=$_SESSION["color"];
     //echo $colorantiguo;
     // Obtén el ID de usuario actual desde la sesión
$idcol = $_SESSION["usuario"];
$colorr = mysqli_query($con, "SELECT color FROM estudiantes WHERE ci ='$idcol'");
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
        
        
    <form action="guardar_color.php" method="post">
    <h1 for="colorFondo">Selecciona un color de fondo:</h1>
    <input type="color" name="colorFondo">
    <button type="submit" onclick="guardarColorFondo()" name="rol" value="estudiante">Guardar Color</button>
    </form>


    <br>
        <table>
            
	<tr>
		<td>materia_id</td>
        <td>semestre</td>
        <td>promedios</td>
        
	</tr>
    <?php
     include "conexion.inc.php";
// Verifica si la variable de sesión "usuario" está definida
if (isset($_SESSION["usuario"])) {
    // Recupera el valor de "usuario" en una variable
    $id = $_SESSION["usuario"];
    
    // Ahora puedes usar $estudiante_id en tu página de estudiante
    echo "¡Hola, estudiante $id!";
    $resultado=mysqli_query($con, "select * from inscripcion where estudiante_id='$id'");
while($registro=mysqli_fetch_array($resultado))
{
	echo "<tr>";
	echo "<td>".$registro["materia_id"]."</td>";
	echo "<td>".$registro["semestre"]."</td>";
    echo "<td>".$registro["promedios"]."</td>";
	echo "</tr>";

}

} else {
    // La variable de sesión "usuario" no está definida, realiza alguna acción de manejo de sesiones aquí
    echo "No has iniciado sesión como estudiante.";
}
?>
</table>
<button onclick="window.location.href='index.php'">Volver</button></section>

</body>
</html>
