<?php
// Inicia uma sessão PHP
session_start();

// Conecta-se ao banco de dados usando MySQLi
$mysqli = mysqli_connect('db', 'lucas', 'senha', 'cadastro');

// Verifica se a conexão foi bem-sucedida
if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

// Obtém o nome de usuário e senha do formulário de login
$username = $_POST['username'];
$password = $_POST['password'];

// Verifica se o nome de usuário e senha são "admin"
if ($username == "admin" && $password == "admin") {
    $table_name = "cadastro";

    // Realiza uma consulta para listar todos os registros na tabela "cadastro"
    $query = "SELECT * FROM $table_name";
    $response = mysqli_query($mysqli, $query);

    // Exibe os resultados na página
    echo "<strong>$table_name: </strong>";
    while ($i = mysqli_fetch_assoc($response)) {
        echo "<p>" . $i['id'] . "</p>";
        echo "<p>" . $i['username'] . "</p>";
        echo "<p>" . $i['password'] . "</p>";
        echo "<hr>";
    }
} elseif ($username == "" || $password == "") {
    // Valida se o nome de usuário ou senha estão em branco
    echo "Erro no login";
} else {
    // Realiza uma consulta para verificar o nome de usuário e senha no banco de dados
    $query = "SELECT id, username, password FROM cadastro WHERE username='$username'";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifica se a senha fornecida corresponde à senha no banco de dados
        if ($password == $row['password']) {
            echo "Login bem-sucedido!";

            // Inicia uma sessão de usuário e redireciona para a página do usuário
            $_SESSION['user_id'] = $row['id'];
            echo '<p> <a href="user_page.php">Sua pagina</a></p>';
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Nome de usuário não encontrado.";
    }
}

// Fecha a conexão com o banco de dados
$mysqli->close();
?>
