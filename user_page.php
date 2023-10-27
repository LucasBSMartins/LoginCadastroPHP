<?php
// Inicia uma sessão PHP para gerenciar informações do usuário
session_start();

// Conecta-se ao banco de dados usando MySQLi
$mysqli = mysqli_connect('db', 'lucas', 'senha', 'cadastro');

// Verifica se a conexão com o banco de dados foi bem-sucedida

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o formulário foi enviado via POST
    $novoNome = $_POST["novo_nome"];
    $novaSenha = $_POST["nova_senha"];

    // Obtém o ID do usuário da sessão
    $id = $_SESSION['user_id'];

    // Atualiza o nome de usuário e senha no banco de dados
    $query = "UPDATE cadastro SET username = '$novoNome', password = '$novaSenha' WHERE id = $id";

    if ($mysqli->query($query)) {
        echo "Atualização bem-sucedida!";
    } else {
        echo "Erro na atualização: " . $mysqli->error;
    }
}

// Obtém o ID do usuário da sessão
$id = $_SESSION['user_id'];

// Consulta o banco de dados para obter o nome de usuário e senha do usuário
$query = "SELECT username, password FROM cadastro WHERE id = $id";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nomeUsuario = $row['username'];
    $senha = $row['password'];
}

// Fecha a conexão com o banco de dados
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Minha Página</title>
</head>
<body>
    <h2>Minha Página</h2>
    <p>Nome de Usuário: <?php echo $nomeUsuario; ?></p>
    <p>Senha: <?php echo $senha; ?></p>

    <h3>Atualizar Dados</h3>
    <!-- Formulário para atualizar o nome de usuário e senha -->
    <form method="post" action="">
        <label for="novo_nome">Novo Nome de Usuário:</label>
        <input type="text" name="novo_nome" required><br>

        <label for="nova_senha">Nova Senha:</label>
        <input type="password" name="nova_senha" required><br>

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
