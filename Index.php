<?php include('INCLUDE/conexion.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Biblioteca</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>Bienvenido a la Biblioteca</h1>
    <nav>
        <ul>
            <li><a href="PAGE/users.php">Usuarios</a></li>
            <li><a href="PAGE/prestamos.php">Préstamos</a></li>
            <li><a href="PAGE/devoluciones.php">Devoluciones</a></li>
            <li><a href="PAGE/busquedas.php">Buscar Libros</a></li>
        </ul>
    </nav>
    <?php
// Comprueba si el método de solicitud es POST (es decir, si se ha enviado un formulario)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene el término de búsqueda del formulario y lo sanitiza
    $search = mysqli_real_escape_string($conexion, $_POST['search']);

    // Construye la consulta SQL para buscar libros por título o autor
    $sql_search = "SELECT books.title, authors.name AS author, books.available
                  FROM books
                  JOIN authors ON books.author_id = authors.id
                  WHERE books.title LIKE '%$search%'
                  OR authors.name LIKE '%$search%'";

    // Ejecuta la consulta SQL
    $resultado = mysqli_query($conexion, $sql_search);

    // Si se encontraron resultados
    if (mysqli_num_rows($resultado) > 0) {
        // Recorre cada resultado
        while ($row = mysqli_fetch_assoc($resultado)) {
            // Determina el estado del libro (disponible o no)
            $estado = $row['available'] ? "Disponible" : "No disponible";

            // Imprime los resultados en formato HTML
            echo "Título: " . $row['title'] . " - Autor: " . $row['author'] . " - Estado: " . $estado . "<br>";
        }
    } else {
        // Si no se encontraron resultados
        echo "No se encontraron libros.";
    }
}
?>

<form method="POST">
    Buscar libro o autor: <input type="text" name="search" required><br>
    <input type="submit" value="Buscar">
</form>

<a href="../index.php">Regresar al Home</a>
</body>
</html>