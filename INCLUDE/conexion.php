<?php
// Datos de conexión a la base de datos
$host = "localhost";
$dbname = "biblioteca";
$username = "root";
$password = "";

// Intentar la conexión a la base de datos
$conexion = mysqli_connect($host, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
?>

