<?php

require_once __DIR__ ."\..\..\model\Filme.php";

if($_SERVER["REQUEST_METHOD"] =="POST"){
    $id  = $_POST["id"];

    if(!empty($id)){
        $filmeModel = new Filme();
        $Sucesso = $filmeModel->excluir($id);

        if($Sucesso){
            return header("Location:listar.php?mensagem=sucesso");
        }
        else{
            return header("Location:listar.php?mensagem=erro");
        }
    }
}

return header(header:"Location: listar.php");

?>