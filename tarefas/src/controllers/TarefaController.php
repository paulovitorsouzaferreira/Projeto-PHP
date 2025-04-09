<?php
require_once '../models/Tarefa.php';
require_once '../config/database.php';

class TarefaController {
    private $model;

    public function __construct() {
        $db = new Database();
        $this->model = new Tarefa($db->connect());
    }

    public function handleRequest() {
        $action = $_POST['action'] ?? null;
        switch ($action) {
            case 'create':
                $this->model->criar($_POST['titulo'], $_POST['descricao']);
                break;
            case 'complete':
                $this->model->marcarConcluida($_POST['id']);
                break;
            case 'delete':
                $this->model->excluir($_POST['id']);
                break;
        }
       
        header('Location: ../views/tarefas.php');
        exit;
    }

    public function listar() {
        return $this->model->listar();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new TarefaController();
    $controller->handleRequest();
}
