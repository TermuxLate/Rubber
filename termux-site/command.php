<?php
require_once __DIR__ . '/includes/functions.php';
$all = load_commands(__DIR__ . '/data/commands.json');
$name = isset($_GET['name']) ? trim((string)$_GET['name']) : '';
$command = null;
foreach ($all as $item) {
  if (strcasecmp($item['name'], $name) === 0) {
    $command = $item;
    break;
  }
}
if (!$command) {
  http_response_code(404);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $command ? htmlspecialchars($command['name']) . ' — Termux команда' : 'Команда не найдена' ?></title>
  <meta name="description" content="<?= $command ? htmlspecialchars($command['summary']) : 'Команда не найдена' ?>" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/styles.css" />
  <link rel="icon" href="/assets/img/termux.svg" />
</head>
<body>
  <header class="site-header">
    <div class="container header-inner">
      <a href="/" class="brand">
        <img src="/assets/img/termux.svg" alt="Termux" class="brand-logo" />
        <span class="brand-name">Termux</span>
      </a>
      <nav class="nav">
        <a href="/" class="nav-link">Назад к справочнику</a>
      </nav>
    </div>
  </header>

  <main class="detail">
    <div class="container">
      <?php if (!$command): ?>
        <h1>Команда не найдена</h1>
        <p>Проверьте имя команды или вернитесь на <a href="/">главную</a>.</p>
      <?php else: ?>
        <h1><?= htmlspecialchars($command['name']) ?></h1>
        <div class="meta">
          <span class="badge"><?= htmlspecialchars($command['category']) ?></span>
          <?php if (!empty($command['requires'])): ?>
            <span class="badge badge-outline">Требует: <?= htmlspecialchars(implode(', ', $command['requires'])) ?></span>
          <?php endif; ?>
        </div>
        <p class="lead"><?= htmlspecialchars($command['summary']) ?></p>

        <section>
          <h2>Описание</h2>
          <p><?= nl2br(htmlspecialchars($command['description'])) ?></p>
        </section>

        <section>
          <h2>Синтаксис</h2>
          <pre><code><?= htmlspecialchars($command['syntax']) ?></code></pre>
        </section>

        <?php if (!empty($command['options'])): ?>
        <section>
          <h2>Опции</h2>
          <ul class="options">
            <?php foreach ($command['options'] as $opt): ?>
              <li>
                <code><?= htmlspecialchars($opt['flag']) ?></code>
                <span><?= htmlspecialchars($opt['desc']) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </section>
        <?php endif; ?>

        <?php if (!empty($command['examples'])): ?>
        <section>
          <h2>Примеры</h2>
          <div class="examples">
            <?php foreach ($command['examples'] as $ex): ?>
              <div class="example">
                <div class="example-desc"><?= htmlspecialchars($ex['desc']) ?></div>
                <pre><code><?= htmlspecialchars($ex['cmd']) ?></code></pre>
              </div>
            <?php endforeach; ?>
          </div>
        </section>
        <?php endif; ?>

        <?php if (!empty($command['related'])): ?>
        <section>
          <h2>Похожие команды</h2>
          <div class="related">
            <?php foreach ($command['related'] as $rel): ?>
              <a class="chip" href="/command.php?name=<?= urlencode($rel) ?>"><?= htmlspecialchars($rel) ?></a>
            <?php endforeach; ?>
          </div>
        </section>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </main>

  <footer class="site-footer">
    <div class="container footer-inner">
      <div>
        <strong>Termux Справочник</strong>
        <div class="muted">Неофициальный ресурс. Для образования и удобства.</div>
      </div>
      <div class="footer-links">
        <a href="/">Справочник</a>
      </div>
    </div>
  </footer>
</body>
</html>