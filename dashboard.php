<?php
session_start();

if (!isset($_SESSION['user_type'])) {
    header('Location: login.php');
    exit;
}

if ($_SESSION['user_type'] == 'bibliotecario') {
    echo "<h2>Bem-vindo, Bibliotecário</h2>";
    echo "<a href='cadastrar_livros.php'>Cadastrar Livros</a><br>";
    echo "<a href='visualizar_livros.php'>Visualizar Livros</a><br>";
    echo "<a href='visualizar_pedidos.php'>Visualizar Pedidos</a><br>";
    echo "<a href='logout.php'>Sair</a><br>";
} else {
    echo "<h2>Bem-vindo, Professor</h2>";
    echo "<a href='visualizar_livros.php'>Visualizar Livros</a><br>";
    echo "<a href='cadastrar_pedidos.php'>Cadastrar Pedidos</a><br>";
    echo "<a href='logout.php'>Sair</a><br>";
}
?>
