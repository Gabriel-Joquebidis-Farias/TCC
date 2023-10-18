<?php
// Inclua o arquivo de conexão com o banco de dados
include('conexaoBD.php');

// Inicie a sessão (se já não estiver iniciada)
session_start();

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Verifique se ambos os campos de usuário e senha foram preenchidos
    if (!empty($username) && !empty($password)) {
        // Consulta SQL para verificar se o usuário existe no banco de dados
        $sql = "SELECT id, nome_papelaria, senha_papelaria FROM PI_Papelaria WHERE nome_papelaria = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Usuário encontrado, verificar a senha
            $row = $result->fetch_assoc();
            $senhaHash = $row["senha"];

            // Use a função password_verify para verificar a senha
            if (password_verify($password, $senhaHash)) {
                // Senha correta, o login é bem-sucedido
                // Configurar variáveis de sessão para armazenar informações do usuário
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_nome'] = $row['nome'];

                // Redirecionar o usuário para a página de boas-vindas ou outra página
                echo"Sucesso";
                exit(); // Encerrar a execução após o redirecionamento
            } else {
                // Senha incorreta
                echo "Senha incorreta. Tente novamente.";
            }
        } else {
            // Usuário não encontrado
            echo "Usuário não encontrado. Verifique o nome de usuário.";
        }
    } else {
        // Campos em branco
        echo "Por favor, preencha todos os campos.";
    }
}
?>
