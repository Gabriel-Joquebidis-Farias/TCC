<?php
// Inclua o arquivo de conexão com o banco de dados
include('conexaoBD.php');

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Verifique se ambos os campos de usuário e senha foram preenchidos
    if (!empty($username) && !empty($password)) {
        // Consulta SQL para verificar se o usuário e a senha correspondem
        $sql = "SELECT  nome, senha FROM PI_Cliente WHERE nome = '$username' AND senha = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Usuário e senha correspondem, o login é bem-sucedido
            // Você pode redirecionar o usuário para a página de boas-vindas ou fazer qualquer outra ação desejada aqui
            echo "Login bem-sucedido!";
        } else {
            // Usuário ou senha incorretos
            echo "Usuário ou senha incorretos. Tente novamente.";
        }
    } else {
        // Campos em branco
        echo "Por favor, preencha todos os campos.";
    }
}
?>
