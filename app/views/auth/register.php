<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro // TaskManager Pro</title>
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>

<?php require __DIR__ . '/../baseline/frame_top.php'; ?>

<div class="auth-center">
    <div class="auth-box">
        <div class="auth-corner auth-corner-tl"></div>
        <div class="auth-corner auth-corner-tr"></div>
        <div class="auth-corner auth-corner-bl"></div>
        <div class="auth-corner auth-corner-br"></div>

        <h1 class="auth-title">criar_conta</h1>

        <?php if (isset($error)): ?>
            <div class="error-msg"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="/register">
            <div class="field-group">
                <div class="field">
                    <label for="name">nome</label>
                    <input type="text" id="name" name="name" placeholder="Seu nome" required>
                </div>
                <div class="field">
                    <label for="email">email</label>
                    <input type="email" id="email" name="email" placeholder="usuario@email.com" required>
                </div>
                <div class="field">
                    <label for="password">senha</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                </div>
            </div>
            <button type="submit" class="btn-submit">[ CRIAR CONTA ]</button>
        </form>

        <div class="auth-footer">
            já tem conta? <a href="/login">fazer login</a>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../baseline/frame_bottom.php'; ?>

</body>
</html>