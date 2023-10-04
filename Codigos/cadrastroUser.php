<?php
// Inclua o arquivo de conexão com o banco de dados
include('conexaoBD.php');

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário e realizar a verificação de cada um
    $nome = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $telefone = isset($_POST['tel']) ? $_POST['tel'] : '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    $dataNascimento = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
    $senha = isset($_POST['password']) ? $_POST['password'] : '';

    // Verifique se todos os campos obrigatórios foram preenchidos
    if ($nome && $email && $telefone && $cpf && $dataNascimento && $senha) {
        // Use a função password_hash para criar um hash seguro da senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Inserir os dados no banco de dados (substitua 'PI_Clientes' pelo nome da sua tabela)
        $sql = "INSERT INTO PI_Cliente (nome, email, telefone, cpf, dataNascimento, senha)
                VALUES ('$nome', '$email', '$telefone', '$cpf', '$dataNascimento', '$senhaHash')";

        if ($conn->query($sql) === TRUE) {
            header("Location: login.html");
        } else {
           
        }
    } else {
       
    }
}
?>
