<?php
require_once __DIR__ ."\..\..\model\Filme.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $nome = $_POST["nome"];
    $ano = $_POST["ano"];
    $descricao = $_POST["descricao"];
    $imagem = $_POST["imagem"];

    $filmeModel = new Filme();
    $Sucesso = $filmeModel->inserir($nome, $ano, $descricao, $imagem);

if ($Sucesso) {
    return header("Location:listar.php?mensagem=sucesso");
        }
    else{
        return header("Location:listar.php?mensagem=erro");
    }

}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>

    <link rel="stylesheet" href="/CATALOGO_FILMES/public/css/cadastro.css">
</head>
<body>
    <header>
        <nav>
            <a class="Logo" href="">CineMania</a>
            <ul>
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a href="listar.php">Filmes</a>
                </li>
            </nav>
        </header>
    <section class="cadastro">
        <form action="cadastro.php" method="POST">
            <div>
                <label for="nome">Nome do filme: </label><br>
                <input type="text" name="nome" placeholder="adicione o nome" required>
            </div><br>
            <div>
                <label for="imagem">Imagem:</label><br>
                <input type="text" id="imagem" name="imagem" placeholder="adicione o link da imagem" required>
            </div><br>
            <div>
                <label for="ano">Ano do filme: </label><br>
                <input type="text" name="ano" placeholder="adicione o ano" required>
            </div><br>
            <div>
                <label for="descricao">Descrição do filme: </label><br>
                <input type="text" name="descricao" placeholder="adicione a descricao" required>
            </div><br>
            <button>Salvar</button>
            <script src="/CATALOGO_FILMES/public/js/main.js" defer></script>
        </form>
        <form action="listar.php"method="GET">
            <button title="voltar">voltar</button>
        </form>
   </section>
</body>
</html>