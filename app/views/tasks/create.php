<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Tarefa // TaskManager Pro</title>
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>

<?php require __DIR__ . '/../baseline/frame_top.php'; ?>
<?php require __DIR__ . '/../baseline/navbar.php'; ?>

<div class="auth-center">
    <div class="auth-box" style="max-width:480px;">
        <div class="auth-corner auth-corner-tl"></div>
        <div class="auth-corner auth-corner-tr"></div>
        <div class="auth-corner auth-corner-bl"></div>
        <div class="auth-corner auth-corner-br"></div>

        <h1 class="auth-title">nova_tarefa</h1>

        <form method="POST" action="/tasks/create">
            <div class="field-group">
                <div class="field">
                    <label for="title">título</label>
                    <input type="text" id="title" name="title" placeholder="Nome da tarefa" required>
                </div>
                <div class="field">
                    <label for="description">descrição</label>
                    <textarea id="description" name="description" placeholder="Detalhes da tarefa..."></textarea>
                </div>
                <div class="field">
                    <label for="priority">prioridade</label>
                    <select id="priority" name="priority">
                        <option value="baixa">[ LOW ] Baixa</option>
                        <option value="media" selected>[ ~MED ] Média</option>
                        <option value="alta">[ !ALTA ] Alta</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn-submit">[ SALVAR TAREFA ]</button>
        </form>

        <div class="auth-footer">
            <a href="/dashboard">← voltar ao dashboard</a>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../baseline/frame_bottom.php'; ?>

</body>
</html>