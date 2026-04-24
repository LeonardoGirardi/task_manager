<!DOCTYPE html>
<html>
<head>
    <title>Nova Tarefa</title>
</head>
<body>

<h2>Criar Tarefa</h2>

<form method="POST" action="/tasks/create">

    <input type="text" name="title" placeholder="Título" required>
    <br><br>

    <textarea name="description" placeholder="Descrição"></textarea>
    <br><br>

    <select name="priority">
        <option value="baixa">Baixa</option>
        <option value="media">Média</option>
        <option value="alta">Alta</option>
    </select>

    <br><br>

    <button type="submit">Salvar</button>
</form>

<br>

<a href="/dashboard">Voltar</a>

</body>
</html>