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
<form action="guardar_color.php" method="post">
    <h1 for="colorFondo">Selecciona un color de fondo:</h1>
    <input type="color" name="colorFondo">
    <button type="submit" onclick="guardarColorFondo()" name="rol" value="docente">Guardar Color</button>
    </form>

<br>       
                <table>
	<tr>
		<td>sigla</td>
        <td>paralelo</td>
        <td>nomMateria</td>
        
	</tr>
<?php
include "conexion.inc.php";

// Verifica si la variable de sesión "usuario" está definida
if (isset($_SESSION["usuario"])) {
    // Recupera el valor de "usuario" en una variable
    $id = $_SESSION["usuario"];
    
    // Ahora puedes usar $docente_id en tu página de estudiante
    echo "¡Hola, docente $id!";
    $resultado=mysqli_query($con, "select * from materia where docenteCi='$id'");
while($registro=mysqli_fetch_array($resultado))
{
	echo "<tr>";
	echo "<td>".$registro["sigla"]."</td>";
	echo "<td>".$registro["paralelo"]."</td>";
    echo "<td>".$registro["nomMateria"]."</td>";

	echo "<td>";
	echo "Modificar ";
	echo "</td>";
	echo "</tr>";
}

} else {
    // La variable de sesión "usuario" no está definida, realiza alguna acción de manejo de sesiones aquí
    echo "No has iniciado sesión como estudiante.";
}


?>
</table>
<button onclick="window.location.href='index.php'">Volver</button></section>
<script>
    
    function guardarColorFondo() {
           // Obtener el valor del color seleccionado por el usuario

$colorSeleccionado = document.getElementById("colorFondo").value 
// Aplicar el color de fondo a la página actual
document.body.style.backgroundColor = $colorSeleccionado;
}
</script>

</body>
</html>
