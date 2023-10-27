<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
</head>
<body>
    <h2>Cadastro</h2>
    <!-- Título da página de cadastro -->

    <form action="register_process.php" method="post">
        <!-- Formulário de cadastro que envia dados para "register_process.php" usando o método POST -->

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

        <input type="submit" value="Cadastrar">
        <!-- Botão de envio do formulário com rótulo "Cadastrar" -->
    </form>
</body>
</html>
