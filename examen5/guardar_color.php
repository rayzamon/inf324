<?php
$colorguardar=$_POST["colorFondo"];
echo $colorguardar;
session_start();
$id = $_SESSION["usuario"];
echo $id;
$rol=$_POST["rol"];

include "conexion.inc.php";

if($rol=="estudiante"){
$identidad = mysqli_query($con, "update estudiantes set color='$colorguardar' where ci='$id'");
echo $identidad;
header("Location: estudiante.php");
}else if($rol=="docente"){
    $identidad = mysqli_query($con, "update docentes set color='$colorguardar' where ciD='$id'");
echo $identidad;
header("Location: docente.php");
}


?>
