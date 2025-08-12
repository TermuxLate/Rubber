<?php
/**
 * Termux Guide - Installation Script
 * 
 * Этот скрипт поможет установить и настроить веб-сайт Termux Guide.
 * Запустите его один раз после загрузки файлов на сервер.
 */

// Включаем отображение ошибок для установки
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Проверяем, что скрипт запущен через веб-сервер
if (php_sapi_name() === 'cli') {
    echo "Этот скрипт должен быть запущен через веб-сервер.\n";
    exit(1);
}

// Функция для проверки требований
function checkRequirements() {
    $requirements = [
        'php_version' => [
            'name' => 'PHP Version',
            'required' => '7.4.0',
            'current' => PHP_VERSION,
            'status' => version_compare(PHP_VERSION, '7.4.0', '>=')
        ],
        'json_extension' => [
            'name' => 'JSON Extension',
            'required' => 'Enabled',
            'current' => extension_loaded('json') ? 'Enabled' : 'Disabled',
            'status' => extension_loaded('json')
        ],
        'mbstring_extension' => [
            'name' => 'Mbstring Extension',
            'required' => 'Enabled',
            'current' => extension_loaded('mbstring') ? 'Enabled' : 'Disabled',
            'status' => extension_loaded('mbstring')
        ],
        'curl_extension' => [
            'name' => 'cURL Extension',
            'required' => 'Enabled',
            'current' => extension_loaded('curl') ? 'Enabled' : 'Disabled',
            'status' => extension_loaded('curl')
        ],
        'writable_directories' => [
            'name' => 'Writable Directories',
            'required' => 'Writable',
            'current' => 'Checking...',
            'status' => true
        ]
    ];
    
    // Проверяем права на запись в директории
    $directories = ['cache', 'logs'];
    $writable = true;
    
    foreach ($directories as $dir) {
        if (!is_dir($dir)) {
            if (!mkdir($dir, 0755, true)) {
                $writable = false;
            }
        } elseif (!is_writable($dir)) {
            $writable = false;
        }
    }
    
    $requirements['writable_directories']['current'] = $writable ? 'Writable' : 'Not Writable';
    $requirements['writable_directories']['status'] = $writable;
    
    return $requirements;
}

// Функция для создания необходимых директорий
function createDirectories() {
    $directories = [
        'cache' => 0755,
        'logs' => 0755,
        'assets/uploads' => 0755
    ];
    
    $results = [];
    
    foreach ($directories as $dir => $permissions) {
        if (!is_dir($dir)) {
            if (mkdir($dir, $permissions, true)) {
                $results[$dir] = 'Created';
            } else {
                $results[$dir] = 'Failed to create';
            }
        } else {
            if (chmod($dir, $permissions)) {
                $results[$dir] = 'Exists (permissions updated)';
            } else {
                $results[$dir] = 'Exists (permissions failed)';
            }
        }
    }
    
    return $results;
}

// Функция для создания .htaccess файла
function createHtaccess() {
    $htaccessContent = '# Termux Guide - Apache Configuration

# Enable URL rewriting
RewriteEngine On

# Security headers
<IfModule mod_headers.c>
    Header always append X-Frame-Options SAMEORIGIN
    Header always set X-Content-Type-Options nosniff
    Header always set X-XSS-Protection "1; mode=block"
    Header always set Referrer-Policy "strict-origin-when-cross-origin"
</IfModule>

# Compression
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/plain
    AddOutputFilterByType DEFLATE text/html
    AddOutputFilterByType DEFLATE text/css
    AddOutputFilterByType DEFLATE application/javascript
    AddOutputFilterByType DEFLATE application/json
</IfModule>

# Browser caching
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
    ExpiresByType image/png "access plus 1 month"
    ExpiresByType image/jpg "access plus 1 month"
    ExpiresByType image/jpeg "access plus 1 month"
</IfModule>

# Prevent access to sensitive files
<FilesMatch "\.(htaccess|htpasswd|ini|log|sh|inc|bak)$">
    Order Allow,Deny
    Deny from all
</FilesMatch>

# Prevent directory browsing
Options -Indexes

# Set default character set
AddDefaultCharset UTF-8
';
    
    if (file_put_contents('.htaccess', $htaccessContent)) {
        return 'Created successfully';
    } else {
        return 'Failed to create';
    }
}

// Функция для проверки файлов
function checkFiles() {
    $requiredFiles = [
        'index.php',
        'assets/css/style.css',
        'assets/js/script.js',
        'api/commands.php',
        'config.php'
    ];
    
    $results = [];
    
    foreach ($requiredFiles as $file) {
        if (file_exists($file)) {
            $results[$file] = 'Exists';
        } else {
            $results[$file] = 'Missing';
        }
    }
    
    return $results;
}

// Функция для создания файла конфигурации
function createConfig() {
    if (file_exists('config.php')) {
        return 'Already exists';
    }
    
    $configContent = '<?php
// Termux Guide - Configuration File

// Основные настройки сайта
define("SITE_NAME", "Termux Guide");
define("SITE_DESCRIPTION", "Полное руководство по командам Termux на русском языке");
define("SITE_URL", "' . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '");
define("SITE_VERSION", "1.0.0");

// Настройки разработки
define("DEBUG_MODE", false);
define("SHOW_ERRORS", false);

// Настройки API
define("API_ENABLED", true);
define("API_RATE_LIMIT", 100);
define("API_CACHE_TIME", 3600);

// Настройки поиска
define("SEARCH_MIN_LENGTH", 2);
define("SEARCH_MAX_RESULTS", 50);
define("SEARCH_SUGGESTIONS_LIMIT", 10);

// Настройки отображения
define("COMMANDS_PER_PAGE", 20);
define("PACKAGES_PER_PAGE", 12);
define("TUTORIALS_PER_PAGE", 8);

// Настройки кэширования
define("CACHE_ENABLED", true);
define("CACHE_DIR", __DIR__ . "/cache/");
define("CACHE_TIME", 3600);

// Настройки безопасности
define("CSRF_PROTECTION", true);
define("XSS_PROTECTION", true);
define("CONTENT_SECURITY_POLICY", true);

// Настройки аналитики
define("GOOGLE_ANALYTICS_ID", "");
define("YANDEX_METRIKA_ID", "");

// Настройки социальных сетей
define("TELEGRAM_CHANNEL", "@termux_guide");
define("VK_GROUP", "termux_guide");
define("GITHUB_REPO", "https://github.com/your-username/termux-guide");

// Настройки контактов
define("CONTACT_EMAIL", "support@termux-guide.com");
define("CONTACT_TELEGRAM", "@termux_guide");

// Настройки темы
define("DEFAULT_THEME", "light");
define("THEME_TOGGLE_ENABLED", true);

// Настройки производительности
define("MINIFY_CSS", true);
define("MINIFY_JS", true);
define("ENABLE_GZIP", true);
define("ENABLE_CACHE_HEADERS", true);

// Настройки локализации
define("DEFAULT_LANGUAGE", "ru");
define("SUPPORTED_LANGUAGES", ["ru", "en"]);

// Установка временной зоны
date_default_timezone_set("Europe/Moscow");

// Установка локали
setlocale(LC_ALL, "ru_RU.UTF-8");

// Настройка обработки ошибок
if (defined("DEBUG_MODE") && DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
} else {
    error_reporting(0);
    ini_set("display_errors", 0);
}

// Создание директории кэша, если она не существует
if (defined("CACHE_ENABLED") && CACHE_ENABLED && !is_dir(CACHE_DIR)) {
    mkdir(CACHE_DIR, 0755, true);
}

// Функция для логирования
function logMessage($message, $level = "INFO") {
    if (defined("DEBUG_MODE") && DEBUG_MODE) {
        $logFile = __DIR__ . "/logs/app.log";
        $logDir = dirname($logFile);
        
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }
        
        $timestamp = date("Y-m-d H:i:s");
        $logEntry = "[$timestamp] [$level] $message" . PHP_EOL;
        
        file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
    }
}

// Логирование загрузки конфигурации
logMessage("Configuration loaded successfully");
?>';
    
    if (file_put_contents('config.php', $configContent)) {
        return 'Created successfully';
    } else {
        return 'Failed to create';
    }
}

// Обработка формы установки
$step = $_GET['step'] ?? 1;
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($step) {
        case 1:
            // Проверка требований
            $requirements = checkRequirements();
            $allMet = true;
            
            foreach ($requirements as $req) {
                if (!$req['status']) {
                    $allMet = false;
                    break;
                }
            }
            
            if ($allMet) {
                $step = 2;
            } else {
                $error = 'Не все требования системы выполнены. Исправьте ошибки и попробуйте снова.';
            }
            break;
            
        case 2:
            // Создание директорий и файлов
            $directories = createDirectories();
            $htaccess = createHtaccess();
            $config = createConfig();
            
            $allSuccess = true;
            foreach ($directories as $result) {
                if (strpos($result, 'Failed') !== false) {
                    $allSuccess = false;
                    break;
                }
            }
            
            if ($allSuccess && $htaccess === 'Created successfully' && $config === 'Created successfully') {
                $step = 3;
                $message = 'Установка завершена успешно!';
            } else {
                $error = 'Ошибка при создании файлов и директорий. Проверьте права доступа.';
            }
            break;
    }
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Установка Termux Guide</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            max-width: 800px;
            width: 100%;
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #00d4aa, #667eea);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        
        .header p {
            opacity: 0.9;
        }
        
        .content {
            padding: 2rem;
        }
        
        .step {
            display: none;
        }
        
        .step.active {
            display: block;
        }
        
        .step-number {
            background: #00d4aa;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-weight: bold;
        }
        
        .step-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }
        
        .requirement {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            margin-bottom: 0.5rem;
        }
        
        .requirement.pass {
            border-color: #28a745;
            background: #f8fff9;
        }
        
        .requirement.fail {
            border-color: #dc3545;
            background: #fff8f8;
        }
        
        .status {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .status.pass {
            background: #28a745;
            color: white;
        }
        
        .status.fail {
            background: #dc3545;
            color: white;
        }
        
        .btn {
            background: linear-gradient(135deg, #00d4aa, #667eea);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }
        
        .message {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        
        .message.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .message.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .file-list {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        
        .file-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .file-item:last-child {
            border-bottom: none;
        }
        
        .progress {
            width: 100%;
            height: 8px;
            background: #e9ecef;
            border-radius: 4px;
            overflow: hidden;
            margin: 1rem 0;
        }
        
        .progress-bar {
            height: 100%;
            background: linear-gradient(135deg, #00d4aa, #667eea);
            transition: width 0.3s ease;
        }
        
        .footer {
            background: #f8f9fa;
            padding: 1rem 2rem;
            text-align: center;
            color: #6c757d;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Termux Guide</h1>
            <p>Мастер установки</p>
        </div>
        
        <div class="content">
            <?php if ($message): ?>
                <div class="message success"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>
            
            <?php if ($error): ?>
                <div class="message error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            
            <!-- Шаг 1: Проверка требований -->
            <div class="step <?php echo $step == 1 ? 'active' : ''; ?>">
                <div class="step-title">
                    <span class="step-number">1</span>
                    Проверка требований системы
                </div>
                
                <div class="progress">
                    <div class="progress-bar" style="width: 33%;"></div>
                </div>
                
                <?php
                $requirements = checkRequirements();
                $passed = 0;
                $total = count($requirements);
                ?>
                
                <?php foreach ($requirements as $key => $req): ?>
                    <?php if ($req['status']) $passed++; ?>
                    <div class="requirement <?php echo $req['status'] ? 'pass' : 'fail'; ?>">
                        <div>
                            <strong><?php echo htmlspecialchars($req['name']); ?></strong>
                            <br>
                            <small>Требуется: <?php echo htmlspecialchars($req['required']); ?></small>
                        </div>
                        <div>
                            <span class="status <?php echo $req['status'] ? 'pass' : 'fail'; ?>">
                                <?php echo htmlspecialchars($req['current']); ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <p style="margin-top: 1rem;">
                    <strong>Результат:</strong> <?php echo $passed; ?> из <?php echo $total; ?> требований выполнено
                </p>
                
                <form method="post" style="margin-top: 2rem;">
                    <button type="submit" class="btn" <?php echo $passed < $total ? 'disabled' : ''; ?>>
                        <?php echo $passed < $total ? 'Исправьте ошибки' : 'Продолжить'; ?>
                    </button>
                </form>
            </div>
            
            <!-- Шаг 2: Создание файлов -->
            <div class="step <?php echo $step == 2 ? 'active' : ''; ?>">
                <div class="step-title">
                    <span class="step-number">2</span>
                    Создание файлов и директорий
                </div>
                
                <div class="progress">
                    <div class="progress-bar" style="width: 66%;"></div>
                </div>
                
                <p>Создание необходимых директорий и файлов конфигурации...</p>
                
                <form method="post" style="margin-top: 2rem;">
                    <button type="submit" class="btn">Создать файлы</button>
                </form>
            </div>
            
            <!-- Шаг 3: Завершение -->
            <div class="step <?php echo $step == 3 ? 'active' : ''; ?>">
                <div class="step-title">
                    <span class="step-number">3</span>
                    Установка завершена
                </div>
                
                <div class="progress">
                    <div class="progress-bar" style="width: 100%;"></div>
                </div>
                
                <div class="message success">
                    <h3>🎉 Поздравляем!</h3>
                    <p>Termux Guide успешно установлен на ваш сервер.</p>
                </div>
                
                <div class="file-list">
                    <h4>Созданные файлы и директории:</h4>
                    <?php
                    $directories = createDirectories();
                    foreach ($directories as $dir => $result): ?>
                        <div class="file-item">
                            <span><?php echo htmlspecialchars($dir); ?></span>
                            <span class="status pass"><?php echo htmlspecialchars($result); ?></span>
                        </div>
                    <?php endforeach; ?>
                    
                    <div class="file-item">
                        <span>.htaccess</span>
                        <span class="status pass">Created successfully</span>
                    </div>
                    
                    <div class="file-item">
                        <span>config.php</span>
                        <span class="status pass">Created successfully</span>
                    </div>
                </div>
                
                <div style="margin-top: 2rem;">
                    <h4>Следующие шаги:</h4>
                    <ol style="margin-left: 1.5rem; margin-top: 1rem;">
                        <li>Удалите файл <code>install.php</code> из соображений безопасности</li>
                        <li>Настройте конфигурацию в файле <code>config.php</code></li>
                        <li>Добавьте свой домен в настройки <code>SITE_URL</code></li>
                        <li>Настройте SSL сертификат для HTTPS</li>
                        <li>Добавьте аналитику (Google Analytics, Yandex Metrika)</li>
                    </ol>
                </div>
                
                <div style="margin-top: 2rem;">
                    <a href="index.php" class="btn">Перейти на сайт</a>
                    <a href="config.php" class="btn" style="margin-left: 1rem; background: #6c757d;">Редактировать конфигурацию</a>
                </div>
            </div>
        </div>
        
        <div class="footer">
            <p>Termux Guide v1.0.0 | Сделано с ❤️ для сообщества Termux</p>
        </div>
    </div>
</body>
</html>