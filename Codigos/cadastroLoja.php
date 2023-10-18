<?php
// Inclua o arquivo de conexão com o banco de dados
include('conexaoBD.php');

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário e realizar a verificação de cada um
    $nomePapelaria = isset($_POST['nome_papelaria']) ? $_POST['nome_papelaria'] : '';
    $proprietario = isset($_POST['proprietario']) ? $_POST['proprietario'] : '';
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : '';
    $senhaPapelaria = isset($_POST['senha_papelaria']) ? $_POST['senha_papelaria'] : '';

    // Verifique se todos os campos obrigatórios foram preenchidos
    if ($nomePapelaria && $proprietario && $endereco && $email && $telefone && $cnpj && $senhaPapelaria) {
        // Use a função password_hash para criar um hash seguro da senha da papelaria
        $senhaHash = password_hash($senhaPapelaria, PASSWORD_DEFAULT);

        // Inserir os dados no banco de dados (substitua 'Papelarias' pelo nome da sua tabela de papelarias)
        $sql = "INSERT INTO PI_Papelaria (nome_papelaria, proprietario, endereco, email, telefone, cnpj, senha_papelaria)
                VALUES ('$nomePapelaria', '$proprietario', '$endereco', '$email', '$telefone', '$cnpj', '$senhaHash')";

        if ($conn->query($sql) === TRUE) {
            // Redirecionar para a página de login ou outra página de sucesso após o cadastro bem-sucedido
            header("Location: loginPapelarias.html");
            exit; // Certifique-se de sair do script após a redireção
        } else {
            // Tratamento de erro: algo deu errado durante a inserção no banco de dados
            echo "Erro ao cadastrar a papelaria: " . $conn->error;
        }
    } else {
        // Tratamento de erro: campos obrigatórios não preenchidos
        echo "Por favor, preencha todos os campos obrigatórios.";
    }

    // Fechar a conexão com o banco de dados (certifique-se de ter uma função para isso em 'conexaoBD.php')
    fecharConexao($conn);
}
?>
