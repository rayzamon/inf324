<?php
$usuario=$_POST["nombre"];
$contrasena=$_POST["contrasena"];
echo $usuario;
echo $contrasena;
$rol=$_POST["rol"];
include "conexion.inc.php";
if($rol=="estudiante"){
    $existe = mysqli_query($con, "SELECT COUNT(*) as count FROM usuariosest WHERE username = '$usuario' AND contraseña = '$contrasena'");
    $registro_existe=mysqli_fetch_array($existe);

    // Verificar si el usuario existe
    if ($registro_existe[0]>0) {
        echo "El usuario existe en la base de datos.";

        $identidad = mysqli_query($con, "SELECT estudiante_id FROM usuariosest WHERE username = '$usuario' AND contraseña = '$contrasena'");
        $registro_identidad=mysqli_fetch_array($identidad);
        $idestudiante=$registro_identidad[0];
        echo $idestudiante;
        session_start();
        $_SESSION["usuario"]=$idestudiante;


        $colorinfo = mysqli_query($con, "SELECT color FROM estudiantes WHERE ci = '$idestudiante'");
        $registro_color=mysqli_fetch_array($colorinfo);
        $color=$registro_color[0];
        $_SESSION["color"]=$color;

        header("Location: estudiante.php");
    } else {
        echo "El usuario no existe en la base de datos.";
    }
}else if($rol=="docente"){
    
    $existe = mysqli_query($con, "SELECT COUNT(*) as count FROM usuariosdoc WHERE username = '$usuario' AND contraseña = '$contrasena'");
    $registro_existe=mysqli_fetch_array($existe);

    // Verificar si el usuario existe
    if ($registro_existe[0]>0) {
        echo "El usuario existe en la base de datos.";

        $identidad = mysqli_query($con, "SELECT docente_id FROM usuariosdoc WHERE username = '$usuario' AND contraseña = '$contrasena'");
        $registro_identidad=mysqli_fetch_array($identidad);
        $iddocente=$registro_identidad[0];
        echo $iddocente;
        session_start();
        $_SESSION["usuario"]=$iddocente;
        header("Location: docente.php");
    } else {
        echo "El usuario no existe en la base de datos.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>soloparaver</title>
</head>
<body>
    
</body>
</html>