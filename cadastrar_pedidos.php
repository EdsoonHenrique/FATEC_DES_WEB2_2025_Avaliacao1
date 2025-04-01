<?php
session_start();

if ($_SESSION['user_type'] != 'professor') {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editora = $_POST['editora'];
    $isbn = $_POST['isbn'];

    // Gravar no arquivo pedidos.txt
    $pedido = $titulo . '|' . $autor . '|' . $editora . '|' . $isbn . "\n";
    file_put_contents('pedidos.txt', $pedido, FILE_APPEND);
    echo "<p>Pedido cadastrado com sucesso!</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Pedidos</title>
</head>
<body>
    <h2>Cadastrar Pedidos</h2>
    <form method="POST" action="cadastrar_pedidos.php">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>
        
        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" required><br><br>
        
        <label for="editora">Editora:</label>
        <input type="text" id="editora" name="editora" required><br><br>
        
        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn" required><br><br>
        
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
