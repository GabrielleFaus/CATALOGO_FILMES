<?php
require_once __DIR__ ."\..\..\model\Filme.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $nome = $_POST["nome"];
    $ano = $_POST["ano"];
    $descricao = $_POST["descricao"];

    $filmeModel = new Filme();
    $Sucesso = $filmeModel->inserir($nome, $ano, $descricao);

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

    <link rel="stylesheet" href="/CATALOGO_FILMES/public/css/style.css">
</head>
<body>
    <section class="cadastro">
        <form action="cadastro.php" method="POST">
            <div>
                <label for="nome">Nome do filme</label>
                <input type="text" name="nome" placeholder="adicione o nome" required>
            </div>
            <div>
                <label for="ano">Ano do filme</label>
                <input type="text" name="ano" placeholder="adicione o ano" required>
            </div>
            <div>
                <label for="descricao">Descrição do filme</label>
                <input type="text" name="descricao" placeholder="adicione a descricao" required>
            </div>
            <button>Salvar</button>
            <script src="/CATALOGO_FILMES/public/js/main.js" defer></script>
        </form>
   </section>
</body>
</html>