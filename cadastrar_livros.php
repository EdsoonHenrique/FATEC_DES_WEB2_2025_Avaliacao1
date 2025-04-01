<?php
session_start();

if ($_SESSION['user_type'] != 'bibliotecario') {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editora = $_POST['editora'];
    $isbn = $_POST['isbn'];

    // Gravar no arquivo livros.txt
    $livro = $titulo . '|' . $autor . '|' . $editora . '|' . $isbn . "\n";
    file_put_contents('livros.txt', $livro, FILE_APPEND);
    echo "<p>Livro cadastrado com sucesso!</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Livros</title>
</head>
<body>
    <h2>Cadastrar Livros</h2>
    <form method="POST" action="cadastrar_livros.php">
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
