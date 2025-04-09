<?php
class Tarefa {
    private $conn;
    private $table = 'tarefas';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function criar($titulo, $descricao) {
        $sql = "INSERT INTO $this->table (titulo, descricao) VALUES (:titulo, :descricao)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        return $stmt->execute();
    }

    public function listar() {
        $sql = "SELECT * FROM $this->table ORDER BY data_criacao DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function marcarConcluida($id) {
        $sql = "UPDATE $this->table SET concluida = 1 WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function excluir($id) {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
