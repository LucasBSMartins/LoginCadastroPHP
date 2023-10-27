<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <!-- Título da página de login -->

    <form action="login_process.php" method="post">
        <!-- Formulário de login que envia dados para "login_process.php" usando o método POST -->

        <label for="username">Nome de Usuário:</label>
        <!-- Rótulo para o campo de nome de usuário -->

        <input type="text" name="username" required>
        <!-- Campo de entrada de texto para o nome de usuário, marcado como obrigatório -->

        <br>

        <label for="password">Senha:</label>
        <!-- Rótulo para o campo de senha -->

        <input type="password" name="password" required>
        <!-- Campo de entrada de senha, marcado como obrigatório -->

        <br>

        <input type="submit" value="Entrar">
        <!-- Botão de envio do formulário com rótulo "Entrar" -->
    </form>
    
    <p>Não possui uma conta? <a href="register.php">Cadastrar</a></p>
    <!-- Parágrafo com um link para a página de cadastro ("register.php") -->
</body>
</html>
