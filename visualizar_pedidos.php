<?php
session_start();

if ($_SESSION['user_type'] != 'bibliotecario') {
    header('Location: login.php');
    exit;
}

$pedidos = file('pedidos.txt');
echo "<h2>Pedidos de Livros</h2>";
echo "<ul>";
foreach ($pedidos as $pedido) {
    $detalhes = explode('|', $pedido);
    echo "<li>" . implode(' - ', $detalhes) . "</li>";
}
echo "</ul>";
?>
