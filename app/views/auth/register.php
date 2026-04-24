<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>

<h2>Criar Conta</h2>

<form method="POST" action="/register">

    <input type="text" name="name" placeholder="Nome" required>
    <br><br>

    <input type="email" name="email" placeholder="Email" required>
    <br><br>

    <input type="password" name="password" placeholder="Senha" required>
    <br><br>

    <button type="submit">Registrar</button>
</form>

<br>

<a href="/login">Voltar</a>

</body>
</html>