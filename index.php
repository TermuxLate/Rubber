<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termux - Полное руководство по командам</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="navbar">
            <div class="nav-container">
                <div class="nav-logo">
                    <i class="fas fa-terminal"></i>
                    <span>Termux Guide</span>
                </div>
                <div class="nav-menu" id="nav-menu">
                    <a href="#home" class="nav-link">Главная</a>
                    <a href="#commands" class="nav-link">Команды</a>
                    <a href="#packages" class="nav-link">Пакеты</a>
                    <a href="#tutorials" class="nav-link">Уроки</a>
                    <a href="#about" class="nav-link">О проекте</a>
                </div>
                <div class="nav-toggle" id="nav-toggle">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">
                    Полное руководство по <span class="highlight">Termux</span>
                </h1>
                <p class="hero-description">
                    Изучите все команды, пакеты и возможности Termux для Android. 
                    От новичка до продвинутого пользователя - все что нужно знать о терминале на Android.
                </p>
                <div class="hero-buttons">
                    <a href="#commands" class="btn btn-primary">
                        <i class="fas fa-play"></i>
                        Начать изучение
                    </a>
                    <a href="#tutorials" class="btn btn-secondary">
                        <i class="fas fa-book"></i>
                        Уроки
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <div class="terminal-mockup">
                    <div class="terminal-header">
                        <div class="terminal-buttons">
                            <span class="btn-red"></span>
                            <span class="btn-yellow"></span>
                            <span class="btn-green"></span>
                        </div>
                        <div class="terminal-title">Termux</div>
                    </div>
                    <div class="terminal-body">
                        <div class="terminal-line">
                            <span class="prompt">$</span>
                            <span class="command">pkg update</span>
                        </div>
                        <div class="terminal-line">
                            <span class="output">Updating package list...</span>
                        </div>
                        <div class="terminal-line">
                            <span class="prompt">$</span>
                            <span class="command">pkg install python</span>
                        </div>
                        <div class="terminal-line">
                            <span class="output">Installing Python...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="search-section">
        <div class="container">
            <div class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="search-input" placeholder="Поиск команд, пакетов или функций...">
                <button id="search-btn" class="search-btn">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Commands Section -->
    <section id="commands" class="commands-section">
        <div class="container">
            <div class="section-header">
                <h2>Команды Termux</h2>
                <p>Полный справочник по всем командам Termux с подробными описаниями и примерами</p>
            </div>
            
            <div class="commands-filter">
                <button class="filter-btn active" data-category="all">Все</button>
                <button class="filter-btn" data-category="basic">Основные</button>
                <button class="filter-btn" data-category="package">Пакеты</button>
                <button class="filter-btn" data-category="file">Файлы</button>
                <button class="filter-btn" data-category="network">Сеть</button>
                <button class="filter-btn" data-category="system">Система</button>
            </div>

            <div class="commands-grid" id="commands-grid">
                <!-- Commands will be loaded here via JavaScript -->
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section id="packages" class="packages-section">
        <div class="container">
            <div class="section-header">
                <h2>Популярные пакеты</h2>
                <p>Установка и настройка полезных пакетов для Termux</p>
            </div>
            
            <div class="packages-grid">
                <div class="package-card">
                    <div class="package-icon">
                        <i class="fab fa-python"></i>
                    </div>
                    <h3>Python</h3>
                    <p>Язык программирования для разработки и автоматизации</p>
                    <div class="package-command">
                        <code>pkg install python</code>
                        <button class="copy-btn" data-command="pkg install python">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>

                <div class="package-card">
                    <div class="package-icon">
                        <i class="fab fa-node-js"></i>
                    </div>
                    <h3>Node.js</h3>
                    <p>Среда выполнения JavaScript для веб-разработки</p>
                    <div class="package-command">
                        <code>pkg install nodejs</code>
                        <button class="copy-btn" data-command="pkg install nodejs">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>

                <div class="package-card">
                    <div class="package-icon">
                        <i class="fab fa-git-alt"></i>
                    </div>
                    <h3>Git</h3>
                    <p>Система контроля версий для разработки</p>
                    <div class="package-command">
                        <code>pkg install git</code>
                        <button class="copy-btn" data-command="pkg install git">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>

                <div class="package-card">
                    <div class="package-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <h3>SQLite</h3>
                    <p>Легковесная база данных</p>
                    <div class="package-command">
                        <code>pkg install sqlite</code>
                        <button class="copy-btn" data-command="pkg install sqlite">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>

                <div class="package-card">
                    <div class="package-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3>Vim</h3>
                    <p>Мощный текстовый редактор</p>
                    <div class="package-command">
                        <code>pkg install vim</code>
                        <button class="copy-btn" data-command="pkg install vim">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>

                <div class="package-card">
                    <div class="package-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h3>Nmap</h3>
                    <p>Сканер портов и сетевой безопасности</p>
                    <div class="package-command">
                        <code>pkg install nmap</code>
                        <button class="copy-btn" data-command="pkg install nmap">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tutorials Section -->
    <section id="tutorials" class="tutorials-section">
        <div class="container">
            <div class="section-header">
                <h2>Уроки и руководства</h2>
                <p>Пошаговые инструкции для начинающих и продвинутых пользователей</p>
            </div>
            
            <div class="tutorials-grid">
                <div class="tutorial-card">
                    <div class="tutorial-image">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <div class="tutorial-content">
                        <h3>Начало работы с Termux</h3>
                        <p>Базовые настройки и первые команды для новичков</p>
                        <a href="#" class="tutorial-link">Читать урок</a>
                    </div>
                </div>

                <div class="tutorial-card">
                    <div class="tutorial-image">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="tutorial-content">
                        <h3>Безопасность в Termux</h3>
                        <p>Настройка SSH, шифрование и защита данных</p>
                        <a href="#" class="tutorial-link">Читать урок</a>
                    </div>
                </div>

                <div class="tutorial-card">
                    <div class="tutorial-image">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="tutorial-content">
                        <h3>Программирование в Termux</h3>
                        <p>Настройка среды разработки для Python, Node.js и других языков</p>
                        <a href="#" class="tutorial-link">Читать урок</a>
                    </div>
                </div>

                <div class="tutorial-card">
                    <div class="tutorial-image">
                        <i class="fas fa-server"></i>
                    </div>
                    <div class="tutorial-content">
                        <h3>Серверные приложения</h3>
                        <p>Запуск веб-серверов, баз данных и других сервисов</p>
                        <a href="#" class="tutorial-link">Читать урок</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2>О проекте Termux Guide</h2>
                    <p>
                        Termux Guide - это полное русскоязычное руководство по использованию Termux на Android устройствах. 
                        Наш проект создан для того, чтобы помочь пользователям освоить мощные возможности терминала 
                        на мобильных устройствах.
                    </p>
                    <p>
                        Мы собрали все необходимые команды, пакеты и инструкции в одном месте, 
                        чтобы сделать изучение Termux максимально простым и эффективным.
                    </p>
                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-check"></i>
                            <span>Подробные описания команд</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check"></i>
                            <span>Примеры использования</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check"></i>
                            <span>Пошаговые уроки</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check"></i>
                            <span>Адаптивный дизайн</span>
                        </div>
                    </div>
                </div>
                <div class="about-stats">
                    <div class="stat">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Команд</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number">100+</div>
                        <div class="stat-label">Пакетов</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Уроков</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Termux Guide</h3>
                    <p>Полное руководство по Termux на русском языке</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-telegram"></i></a>
                        <a href="#"><i class="fab fa-vk"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Разделы</h4>
                    <ul>
                        <li><a href="#commands">Команды</a></li>
                        <li><a href="#packages">Пакеты</a></li>
                        <li><a href="#tutorials">Уроки</a></li>
                        <li><a href="#about">О проекте</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Ресурсы</h4>
                    <ul>
                        <li><a href="#">Документация</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Поддержка</a></li>
                        <li><a href="#">Контакты</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Termux Guide. Все права защищены.</p>
            </div>
        </div>
    </footer>

    <!-- Command Modal -->
    <div id="command-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modal-content"></div>
        </div>
    </div>

    <!-- Notification -->
    <div id="notification" class="notification">
        <span id="notification-text"></span>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>