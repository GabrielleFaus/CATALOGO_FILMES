<?php
 
require_once __DIR__. "\..\config\database.php";
 
// Clase que representa a tabela filme no projeto
 
class Filme{
    private $tabela = 'filme';
 
    protected $conn;

    private $pdo;
 
    //colunas da tabela
    public $id;
    public $nome;
    public $ano;
    public $descricao;
    public $imagem;
 
    public function __construct(){
        global $pdo;
 
        $this->pdo = $pdo;
    }
 
    // Método de busca todos os filmes
    public function buscartodos(): array{
        $query = "SELECT * FROM $this->tabela ORDER BY id DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__ );
 
        return $stmt->fetchall();
 
    }
    public function findById($id): mixed{
        $query = "SELECT * FROM $this->tabela WHERE id = :id";
        $stmt = $this->pdo->prepare(query: $query);
        $stmt->bindParam(":id", var: $id, type: PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__ );

        return $stmt->fetch();
    }

    public function excluir($id): mixed{
        $query = "DELETE FROM $this->tabela WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id", var: $id, type: PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function inserir($nome, $ano, $descricao, $imagem): bool
    {
        $query = "INSERT INTO $this->tabela (nome, ano, descricao, imagem)
            VALUES (:nome, :ano, :descricao, :imagem)";

        $stmt = $this->pdo->prepare(query: $query);
        $stmt->bindParam("nome", $nome);
        $stmt->bindParam("ano", $ano);
        $stmt->bindParam("descricao", $descricao);
        $stmt->bindParam("imagem", $imagem);
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function editar_filme($id, $nome, $ano, $descricao) {
        $query = "UPDATE $this->tabela 
            SET nome = :nome, ano = :ano, descricao = :descricao 
            WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', var: $id);
        $stmt->bindParam(':nome', var: $nome);
        $stmt->bindParam(':ano', var: $ano);
        $stmt->bindParam(':descricao', var: $descricao);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}
?>