<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados de login
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Verificando login e senha para bibliotecário
    if ($login == 'biblio' && $senha == 'biblio') {
        $_SESSION['user_type'] = 'bibliotecario';
        header('Location: dashboard.php');
        exit;
    }
    // Verificando login e senha para professor
    elseif ($login == 'professor' && $senha == 'professor') {
        $_SESSION['user_type'] = 'professor';
        header('Location: dashboard.php');
        exit;
    } else {
        $erro = "Login ou senha inválidos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        
        <input type="submit" value="Entrar">
    </form>
    
    <?php if (isset($erro)) echo "<p style='color:red'>$erro</p>"; ?>
</body>
</html>
