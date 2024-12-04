<?php
require_once __DIR__."\..\..\model\Filme.php";
 
$filmeModel = new Filme();
 
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_POST["id"];
 
    $sucesso = false;
   
    if(empty($id)){
            //fluxo para editar
 
            $nome = $_POST["nome"];
            $ano = $_POST["ano"];
            $descricao = $_POST["descricao"];
 
            $sucesso = $filmeModel->editar_filme($id,$nome,$ano,$descricao);
    } else {
 
   
            $nome = $_POST["nome"];
            $ano = $_POST["ano"];
            $descricao = $_POST["descricao"];
 
            $sucesso = $filmeModel->inserir($nome, $ano, $descricao);
    }
   
    if($sucesso){
        return header("Location: listar.php?mensagem=sucesso");
    } else{
        return header("Location: listar.php?mensagem=erro");
    }
}else if($_SERVER["REQUEST_METHOD"] === "GET"){
 
 
    $filme = null;
 
    if(!empty($_GET['id'])){
 
       $filme = $filmeModel->findById($_GET['id']);
    }else{
        $filme = new Filme();
    }
 
}
 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Filme</title>
</head>
<body>
    <section>
        <form action="editar.php"method="POST">
            <div>
                <input type="hidden" name="id" value="<?php echo $id ?>" required>
            </div>  
            <div>
                <label for="nome">Nome do filme</label>
                    <input type="text" name="nome" value="<?php echo $filme->nome;?>"required>
            </div>
            <div>
                <label for="ano">Ano do filme</label>
                    <input type="text" name="ano" value="<?php echo $filme->ano;?>" required>
            </div>
            <div>
                <label for="descricao">Descrição do filme</label>
                    <input type="text" name="descricao" value="<?php echo $filme->descricao;?>" required>
            </div>
            <button>Salvar</button>
        </form>
    </section>
</body>
</html>