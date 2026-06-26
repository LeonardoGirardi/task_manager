<?php
$userName = $_SESSION['user']['name'] ?? 'Usuário';
$firstName = explode(' ', $userName)[0];
?>
<nav class="navbar">
    <div class="navbar-brand">TASK_MGR<span>_PRO</span></div>

    <div class="navbar-clock">
        <div class="nav-bar-group">
            <span class="nav-bar-label">dia: <span id="nav-pct">0%</span></span>
            <div class="nav-bar-track">
                <div class="nav-bar-fill" id="nav-fill" style="width:0%"></div>
            </div>
        </div>
        <span class="nav-time" id="nav-time">--:--:--</span>
    </div>

    <div class="navbar-user">
        <span class="navbar-greeting">user: <strong><?= htmlspecialchars($firstName) ?></strong></span>
        <a href="/logout" class="btn-logout">[ SAIR ]</a>
    </div>
</nav>

<script>
(function(){
    function tick(){
        const now = new Date();
        const h = String(now.getHours()).padStart(2,'0');
        const m = String(now.getMinutes()).padStart(2,'0');
        const s = String(now.getSeconds()).padStart(2,'0');
        const sec = now.getHours()*3600 + now.getMinutes()*60 + now.getSeconds();
        const pct = Math.round(sec / 864);
        document.getElementById('nav-time').textContent = h+':'+m+':'+s;
        document.getElementById('nav-fill').style.width = pct+'%';
        document.getElementById('nav-pct').textContent  = pct+'%';
    }
    tick();
    setInterval(tick, 1000);
})();
</script>