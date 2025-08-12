<?php
require_once __DIR__ . '/includes/functions.php';
$allCommands = load_commands(__DIR__ . '/data/commands.json');
$categories = extract_categories($allCommands);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="theme-color" content="#0f172a" />
  <title>Termux: Полный справочник команд</title>
  <meta name="description" content="Красивый современный сайт-справочник по Termux на русском языке: все команды, подробные описания, примеры, пояснения и советы. Адаптивный дизайн для всех устройств." />
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
        <a href="#guide" class="nav-link">Справочник</a>
        <a href="#install" class="nav-link">Установка</a>
        <a href="#faq" class="nav-link">FAQ</a>
        <button id="themeToggle" class="theme-toggle" title="Тема">🌓</button>
      </nav>
    </div>
  </header>

  <main>
    <section class="hero">
      <div class="container">
        <h1>Полный справочник команд Termux</h1>
        <p class="subtitle">Подробные описания, примеры и пояснения. Удобный поиск и фильтры. На русском языке.</p>
        <div class="search-wrap">
          <input id="searchInput" type="search" placeholder="Найдите команду, опцию или пример..." aria-label="Поиск" />
        </div>
        <div id="categoryChips" class="chips">
          <button class="chip chip-active" data-category="all">Все</button>
          <?php foreach ($categories as $cat): ?>
            <button class="chip" data-category="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></button>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section id="guide" class="guide-section">
      <div class="container">
        <div id="resultsInfo" class="results-info" aria-live="polite"></div>
        <div id="cards" class="cards">
          <?php // Server-side initial render for no-JS/SEO
          foreach ($allCommands as $cmd): ?>
            <article class="card" data-name="<?= htmlspecialchars($cmd['name']) ?>" data-category="<?= htmlspecialchars($cmd['category']) ?>">
              <div class="card-head">
                <h3 class="card-title">
                  <a href="/command.php?name=<?= urlencode($cmd['name']) ?>" class="card-link"><?= htmlspecialchars($cmd['name']) ?></a>
                </h3>
                <span class="badge"><?= htmlspecialchars($cmd['category']) ?></span>
              </div>
              <p class="card-summary"><?= htmlspecialchars($cmd['summary']) ?></p>
              <div class="card-actions">
                <a class="btn btn-secondary" href="/command.php?name=<?= urlencode($cmd['name']) ?>">Подробнее</a>
                <button class="btn btn-primary btn-copy" data-copy="<?= htmlspecialchars($cmd['syntax']) ?>">Копировать синтаксис</button>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section id="install" class="info-section">
      <div class="container">
        <h2>Установка Termux</h2>
        <ol class="steps">
          <li>Скачайте APK с официального F-Droid: <a href="https://f-droid.org/ru/packages/com.termux/" target="_blank" rel="noopener">Termux на F‑Droid</a>.</li>
          <li>Установите приложение и запустите его.</li>
          <li>Обновите пакеты: <code>pkg update && pkg upgrade</code>.</li>
          <li>Настройте доступ к файлам: <code>termux-setup-storage</code>.</li>
        </ol>
        <p class="note">Совет: Используйте быстрые зеркала через <code>termux-change-repo</code> при медленном соединении.</p>
      </div>
    </section>

    <section id="faq" class="info-section">
      <div class="container">
        <h2>Частые вопросы</h2>
        <details>
          <summary>Где найти разрешения для Termux API?</summary>
          <p>Установите дополнение Termux:API из F‑Droid и выдайте нужные разрешения в настройках Android.</p>
        </details>
        <details>
          <summary>Как включить тёмную тему?</summary>
          <p>Нажмите на кнопку «🌓» вверху — тема переключится и запомнится.</p>
        </details>
        <details>
          <summary>Команда не находится в поиске</summary>
          <p>Проверьте написание. Также убедитесь, что установлен соответствующий пакет (например, <code>termux-api</code>, <code>proot-distro</code>).</p>
        </details>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container footer-inner">
      <div>
        <strong>Termux Справочник</strong>
        <div class="muted">Неофициальный ресурс. Для образования и удобства.</div>
      </div>
      <div class="footer-links">
        <a href="#guide">Справочник</a>
        <a href="#install">Установка</a>
        <a href="#faq">FAQ</a>
      </div>
    </div>
  </footer>

  <script>window.__COMMANDS_JSON__ = "/data/commands.json";</script>
  <script src="/assets/js/app.js" defer></script>
</body>
</html>