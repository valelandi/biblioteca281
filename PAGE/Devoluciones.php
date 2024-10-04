<?php include('../INCLUDE/conexion.php'); ?>
<form method="POST">
    ID del Préstamo: <input type="number" name="loan_id" required><br>
    <input type="submit" value="Devolver Libro">
</form>

<a href="../index.php">Regresar al Home</a>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loan_id = $_POST['loan_id'];
    $return_date = date("Y-m-d");

    $sql_return = "UPDATE loans SET return_date = '$return_date', returned = 1 WHERE id = '$loan_id'";
    $sql_update_book = "UPDATE books SET available = 1 WHERE id = (SELECT book_id FROM loans WHERE id = '$loan_id')";

    if (mysqli_query($conexion, $sql_return) && mysqli_query($conexion, $sql_update_book)) {
        echo "Libro devuelto exitosamente.";
    } else {
        echo "Error al devolver el libro: " . mysqli_error($conexion);
    }
}
?>