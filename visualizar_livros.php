<?php
session_start();

if (!isset($_SESSION['user_type'])) {
    header('Location: login.php');
    exit;
}

if ($_SESSION['user_type'] == 'bibliotecario' || $_SESSION['user_type'] == 'professor') {
    $livros = file('livros.txt');
    echo "<h2>Livros Cadastrados</h2>";
    echo "<ul>";
    foreach ($livros as $livro) {
        $detalhes = explode('|', $livro);
        echo "<li>" . implode(' - ', $detalhes) . "</li>";
    }
    echo "</ul>";
} else {
    header('Location: login.php');
}
?>
