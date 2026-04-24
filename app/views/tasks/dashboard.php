<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Minhas Tarefas</h2>

<a href="/tasks/create">Nova Tarefa</a>
<br><br>

<?php if (!empty($tasks)): ?>

    <?php foreach ($tasks as $task): ?>

        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">

            <strong><?= $task['title'] ?></strong>
            <br>

            <small><?= $task['description'] ?></small>
            <br>

            <b>Status:</b> <?= $task['status'] ?>
            <br>

            <b>Prioridade:</b> <?= $task['priority'] ?>
            <br><br>

            <a href="/tasks/toggle?id=<?= $task['id'] ?>">Toggle</a> |
            <a href="/tasks/delete?id=<?= $task['id'] ?>">Deletar</a>

        </div>

    <?php endforeach; ?>

<?php else: ?>

    <p>Nenhuma tarefa encontrada.</p>

<?php endif; ?>

</body>
</html>