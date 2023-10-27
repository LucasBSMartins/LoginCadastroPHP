<?php
// Conecta-se ao banco de dados MySQL
$mysqli = mysqli_connect('db', 'user123', '123456', 'cadastro');

// Verifica se a conexão foi bem-sucedida
if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

// Obtém o nome de usuário e senha do formulário de registro
$username = $_POST['username'];
$password = $_POST['password'];

// Verifica se o nome de usuário é "admin" (não permitido)
if ($username == "admin") {
    echo "Nome de usuário não permitido";
} else if ($username == "" || $password == "") {
    // Valida se o nome de usuário ou senha estão em branco
    echo "Erro no registro, preencha os campos corretamente";
} else {
    // Verifica se o nome de usuário já está em uso no banco de dados
    $query = "SELECT username FROM cadastro WHERE username = '$username'";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        echo "Este nome de usuário já está em uso. Escolha um nome de usuário diferente.";
    } else {
        // Insere o novo usuário no banco de dados
        $query = "INSERT INTO cadastro (username, password) VALUES ('$username', '$password')";
        if ($mysqli->query($query)) {
            echo "Cadastro realizado com sucesso!";
            echo '<p>Faça login <a href="index.php">aqui</a></p>';
        } else {
            echo "Erro no cadastro: " . $mysqli->error;
        }
    }
}

// Fecha a conexão com o banco de dados
$mysqli->close();
?>
