<?php include('../INCLUDE/conexion.php'); ?>
<form method="POST">
    Buscar libro: <input type="text" name="search" required><br>
    <input type="submit" value="Buscar">
</form>
<a href="../index.php">Regresar al Home</a>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search = $_POST['search'];
    $search = mysqli_real_escape_string($conexion, $search);

    $sql_search = "SELECT books.title, authors.name AS author, books.available
                   FROM books
                   JOIN authors ON books.author_id = authors.id
                   WHERE books.title LIKE '%$search%'
                   OR authors.name LIKE '%$search%'";

    // Aquí debería ir el código para ejecutar la consulta y mostrar los resultados
}
?>