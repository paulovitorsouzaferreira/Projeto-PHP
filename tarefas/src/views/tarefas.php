<?php
require_once '../controllers/TarefaController.php';
$controller = new TarefaController();
$tarefas = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Gerenciamento de Tarefas</h1>
    <form action="/tarefas/src/controllers/TarefaController.php" method="POST">


        <input type="hidden" name="action" value="create">
        <div class="mb-3">
            <input type="text" name="titulo" class="form-control" placeholder="Título" required>
        </div>
        <div class="mb-3">
            <textarea name="descricao" class="form-control" placeholder="Descrição" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Tarefa</button>
    </form>
    <ul class="list-group">
        <?php foreach ($tarefas as $tarefa): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>
                    <strong><?= $tarefa['titulo'] ?></strong>
                    <br>
                    <?= $tarefa['descricao'] ?>
                </span>
                <div>
                    <?php if (!$tarefa['concluida']): ?>
                        <form action="/tarefas/src/controllers/TarefaController.php" method="POST">
                            <input type="hidden" name="action" value="complete">
                            <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                            <button type="submit" class="btn btn-success btn-sm">Concluir</button>
                        </form>
                    <?php endif; ?>
                    <form action="/tarefas/src/controllers/TarefaController.php" method="POST">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
