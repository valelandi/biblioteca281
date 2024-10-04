<?php
include('../INCLUDE/conexion.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Gestión de Usuarios</title>
</head>

<body>
    <h2>Agregar Nuevo Usuario</h2>

    <?php
    // Comprueba si se ha enviado un formulario (método POST)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtiene los datos del formulario
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Escapa los datos para prevenir inyecciones SQL
        $name = mysqli_real_escape_string($conexion, $name);
        $email = mysqli_real_escape_string($conexion, $email);

        // Prepara la consulta SQL para insertar un nuevo usuario
        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

        // Aquí faltaría ejecutar la consulta SQL para insertar el usuario en la base de datos
        // ...
    
    }
    ?>
    <?php
    // Comprueba si se ha enviado un formulario (método POST)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtiene los datos del formulario
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Escapa los datos para prevenir inyecciones SQL
        $name = mysqli_real_escape_string($conexion, $name);
        $email = mysqli_real_escape_string($conexion, $email);

        // Prepara la consulta SQL para insertar un nuevo usuario
        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

        // Ejecuta la consulta SQL
        if (mysqli_query($conexion, $sql)) {
            echo "Usuario agregado exitosamente.";
        } else {
            echo "Error al agregar el usuario: " . mysqli_error($conexion);
        }
    }
    ?>

    <form method="POST">
        Nombre: <input type="text" name="name" required><br>
        Correo Electrónico: <input type="email" name="email" required><br>
        <input type="submit" value="Agregar Usuario">
    </form>

    <a href="../index.php">Regresar al Home</a>
</body>

</html>