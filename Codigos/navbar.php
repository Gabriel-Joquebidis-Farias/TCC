<?php
session_start(); // Inicie a sessão

// Verifique se o usuário está logado com base na variável de sessão
if (isset($_SESSION['user_logado']) && $_SESSION['user_logado']) {
    // O usuário está logado, exiba o link para o perfil
    $perfilLink = "conta-cliente.html";
} else {
    // O usuário não está logado, exiba o link para login
    $perfilLink = "login.html";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Search - Página Inicial</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.php"> <!-- Correção: removido espaço em excesso -->
    <link rel="shortcut icon" href="imagens/Art Search 3 (favicon).png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand"><img src="imagens/navbar.png" width="60%"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.html"><h5>HOME</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produtos.html"><h5>PRODUTOS</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sobre.html"><h5>SOBRE NÓS</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mapa.html"><h5>MAPA</h5></a>
                </li>
            </ul>
            <form class="d-flex tamanhoNav" role="search">
                <li class="nav">
                    <a class="carrinho" href="carrinho.html"><img src="imagens/carrinho.png" height="45px" width="45px" alt="Carrinho"></a>
                </li>
                <a style="font-size: 30px;"> | </a>
                
    <li class="nav">
        <a class="logincadastro" href="<?php echo $perfilLink; ?>"><img src="imagens/pessoa.png" height="45px" width="45px" alt="Pessoa"></a>
    </li>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="login/cadastro" class="nav-link"></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</body>
</html>
