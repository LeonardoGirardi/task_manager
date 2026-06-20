<?php
$total    = count($tasks);
$done     = array_filter($tasks, fn($t) => $t['status'] === 'done');
$pending  = array_filter($tasks, fn($t) => $t['status'] === 'pending');
$highPrio = array_filter($tasks, fn($t) => $t['priority'] === 'alta' && $t['status'] === 'pending');
$donePct  = $total > 0 ? round(count($done) / $total * 100) : 0;

if ($total === 0)            { $gifMood = 'empty';   $gifLabel = 'Nada aqui... zzz'; }
elseif ($donePct === 100)    { $gifMood = 'done';    $gifLabel = 'ALL DONE! :D'; }
elseif (count($highPrio)>=3) { $gifMood = 'stress';  $gifLabel = 'ALERTA: urgentes!'; }
elseif ($donePct >= 60)      { $gifMood = 'good';    $gifLabel = 'Indo bem! :)'; }
else                         { $gifMood = 'working'; $gifLabel = 'Foco total...'; }

$gifList = [
    'empty'   => ['https://media.giphy.com/media/3o7TKMt1VVNkHV2PaE/giphy.gif','https://media.giphy.com/media/26ufnwz3wDUli7GU0/giphy.gif'],
    'done'    => ['https://media.giphy.com/media/26u4cqiYI30juCOGY/giphy.gif','https://media.giphy.com/media/artj92V8o75VPL7AeQ/giphy.gif'],
    'stress'  => ['https://media.giphy.com/media/l3q2K5jinAlChoCLS/giphy.gif','https://media.giphy.com/media/9Y5BbDSkSTiY8/giphy.gif'],
    'good'    => ['https://media.giphy.com/media/Is1O1TWV0LEJi/giphy.gif','https://media.giphy.com/media/XreQmk7ETCak0/giphy.gif'],
    'working' => ['https://media.giphy.com/media/LmNwrBhejkK9EFP504/giphy.gif','https://media.giphy.com/media/13HgwGsXF0aiGY/giphy.gif'],
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard // TaskManager Pro</title>
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>

<?php require __DIR__ . '/../baseline/frame_top.php'; ?>
<?php require __DIR__ . '/../baseline/navbar.php'; ?>

<main class="main-layout">

    <div class="tasks-column">
        <div class="section-header">
            <span class="section-title">minhas_tarefas/</span>
            <a href="/tasks/create" class="btn-primary">[ + NOVA ]</a>
        </div>

        <div class="filter-bar">
            <button class="filter-btn active" data-filter="all">ALL</button>
            <button class="filter-btn" data-filter="alta">!ALTA</button>
            <button class="filter-btn" data-filter="media">~MED</button>
            <button class="filter-btn" data-filter="baixa">LOW</button>
            <button class="filter-btn" data-filter="done">DONE</button>
        </div>

        <div class="task-list" id="task-list">
            <?php if (!empty($tasks)): ?>
                <?php foreach ($tasks as $task): ?>
                    <div class="task-card prio-<?= htmlspecialchars($task['priority']) ?> <?= $task['status'] === 'done' ? 'task-done' : '' ?>"
                         data-priority="<?= htmlspecialchars($task['priority']) ?>"
                         data-status="<?= htmlspecialchars($task['status']) ?>">
                        <div class="task-card-body">
                            <p class="task-title"><?= htmlspecialchars($task['title']) ?></p>
                            <p class="task-desc"><?= htmlspecialchars($task['description']) ?></p>
                            <div class="task-meta">
                                <span class="badge badge-<?= htmlspecialchars($task['priority']) ?>"><?= strtoupper($task['priority']) ?></span>
                                <span class="badge badge-status"><?= $task['status'] === 'done' ? 'DONE' : 'PENDING' ?></span>
                            </div>
                        </div>
                        <div class="task-actions">
                            <a href="/tasks/toggle?id=<?= $task['id'] ?>" class="btn-action btn-toggle"
                               title="<?= $task['status'] === 'done' ? 'Reabrir' : 'Concluir' ?>">
                                <?= $task['status'] === 'done' ? '↩' : '✓' ?>
                            </a>
                            <a href="/tasks/delete?id=<?= $task['id'] ?>" class="btn-action btn-delete"
                               title="Deletar"
                               onclick="return confirm('Deletar esta tarefa?')">✕</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="empty-state">
                    <p>Nenhuma tarefa cadastrada ainda.</p>
                    <a href="/tasks/create" class="btn-primary">[ + CRIAR TAREFA ]</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <aside class="sidebar">
        <div class="side-block">
            <span class="side-label">mood.gif</span>
            <p class="gif-mood"><?= $gifLabel ?></p>
            <div class="gif-wrap">
                <div class="gif-corner"></div>
                <img src="<?= $gifList[$gifMood][0] ?>" alt="gif de humor" id="mood-gif">
            </div>
            <button class="btn-gif" onclick="nextGif()">[ outro gif ]</button>
        </div>

        <div class="side-block">
            <span class="side-label">stats.log</span>
            <div class="stats-grid">
                <div class="stat-box"><span class="stat-num" style="color:var(--white)"><?= $total ?></span><span class="stat-lbl">total</span></div>
                <div class="stat-box"><span class="stat-num" style="color:var(--green)"><?= count($done) ?></span><span class="stat-lbl">feitas</span></div>
                <div class="stat-box"><span class="stat-num" style="color:var(--amber)"><?= count($pending) ?></span><span class="stat-lbl">pending</span></div>
                <div class="stat-box"><span class="stat-num" style="color:var(--red)"><?= count($highPrio) ?></span><span class="stat-lbl">urgente</span></div>
            </div>
        </div>

        <div class="side-block">
            <span class="side-label">progress</span>
            <div class="prog-track">
                <div class="prog-fill" style="width:<?= $donePct ?>%"></div>
                <span class="prog-txt"><?= $donePct ?>%</span>
            </div>
        </div>
    </aside>
</main>

<?php require __DIR__ . '/../baseline/frame_bottom.php'; ?>

<script>
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        const f = this.dataset.filter;
        document.querySelectorAll('.task-card').forEach(card => {
            if (f === 'all')        card.style.display = '';
            else if (f === 'done')  card.style.display = card.dataset.status === 'done' ? '' : 'none';
            else card.style.display = (card.dataset.priority === f && card.dataset.status !== 'done') ? '' : 'none';
        });
    });
});

const moodGifs = <?= json_encode($gifList) ?>;
const currentMood = '<?= $gifMood ?>';
let gifIdx = 0;
function nextGif() {
    const list = moodGifs[currentMood];
    gifIdx = (gifIdx + 1) % list.length;
    document.getElementById('mood-gif').src = list[gifIdx];
}
</script>
</body>
</html>