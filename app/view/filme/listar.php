<?php
 
// printa formatado no navegador
// echo"<pre>";
//print_r();
// echo"</pre>";
require_once __DIR__. "\..\..\model\Filme.php";
 
$filmeModel = new Filme();
$filmes = $filmeModel->buscartodos();
?>
 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>

    <link rel="stylesheet" href="/CATALOGO_FILMES/public/css/style.css">
</head>
<body>
<section class="container">
    <h2>Filmes</h2>
    <div class="acao">
        <a href="cadastro.php">
            <button>
                <span>Novo</span>
                <span class="material-symbols-outlined">add_box</span>
            </button>
        </a>
    </div>
    <table class="table">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Ano</th>
            <th>Descrição</th>
            <th>Ações</th>
        </thead>
        <tbody>
                <?php

                        ///<!--METHODS - GET/POST -->

    
                foreach($filmes as $filme){ ?>
                <?php
    
                ?>
                <tr>
                    <td><?php echo $filme->id?></td>
                    <td><?php echo $filme->nome?></td>
                    <td><?php echo $filme->ano?></td>
                    <td><?php echo $filme->descricao?></td>
    
                    <td>
                        <form action="editar.php">
                            <button>
                            <span class="material-symbols-outlined">edit_square</span>
                            </button>
                        </form>
                        <form action="visualizar.php" method="GET">
                            <input type="hidden" name="id" value="<?= $filme->id;?>">
                            <button title="Detalhes">
                            <span class="material-symbols-outlined">preview</span>
                            </button>
                        </form>
    
                        <form action="excluir.php" method="POST">
                            <input
                                type="hidden"
                                name="id"
                                value="<?php echo $filme->id;?>"
                            >
                            <button onclick="return confirm('Tem certeza que deseja excluir o filme?')">
                            <span class="material-symbols-outlined">delete</span>
                            </button>
                        </form>
                </tr>
                <?php  } ?>
            <tr>
    
            </tr>
        </tbody>
    </table>
    <script src="/CATALOGO_FILMES/public/js/main.js" defer></script>
</section>
</body>
</html>
 