<?php
$servername = "143.106.241.3"; // Nome do servidor
$username = "cl201280"; // Nome de usuário do banco de dados
$password = "cl*13092005"; // Senha do banco de dados
$dbname = "cl201280"; // Nome do banco de dados

// Criar uma conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
