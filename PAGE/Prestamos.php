<?php include('../INCLUDE/conexion.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Préstamos de Libros</title>
</head>

<body>
    <h2>Prestar Libro</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $book_id = $_POST['book_id'];
        $user_id = $_POST['user_id'];
        $loan_date = date("Y-m-d");

        $sql_check = "SELECT available FROM books WHERE id = '$book_id'";
        $result_check = mysqli_query($conexion, $sql_check);
        $row = mysqli_fetch_assoc($result_check);
        // ... (falta el resto del código)
    }
    ?>
    <form method="POST">
        ID del Libro: <input type="number" name="book_id" required><br>
        ID del Usuario: <input type="number" name="user_id" required><br>
        <input type="submit" value="Prestar Libro">
    </form>

    <a href="../index.php">Regresar al Home</a>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $book_id = $_POST['book_id'];
        $user_id = $_POST['user_id'];
        $loan_date = date("Y-m-d");

        $sql_check = "SELECT available FROM books WHERE id = '$book_id'";
        $result_check = mysqli_query($conexion, $sql_check);
        $row = mysqli_fetch_assoc($result_check);

        if ($row['available'] == 1) {
            $sql_loan = "INSERT INTO loans (book_id, user_id, loan_date) VALUES ('$book_id', '$user_id', '$loan_date')";
            $sql_update = "UPDATE books SET available = 0 WHERE id = '$book_id'";

            if (mysqli_query($conexion, $sql_loan) && mysqli_query($conexion, $sql_update)) {
                echo "Libro prestado exitosamente.";
            } else {
                echo "Error al prestar el libro: " . mysqli_error($conexion);
            }
        } else {
            echo "El libro no está disponible.";
        }
    }
    ?>
</body>

</html>