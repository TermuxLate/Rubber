<?php
/**
 * Termux Guide - Configuration File
 * 
 * Этот файл содержит основные настройки для веб-сайта Termux Guide.
 * Измените эти настройки в соответствии с вашими потребностями.
 */

// Основные настройки сайта
define('SITE_NAME', 'Termux Guide');
define('SITE_DESCRIPTION', 'Полное руководство по командам Termux на русском языке');
define('SITE_URL', 'http://localhost:8000'); // Измените на ваш домен
define('SITE_VERSION', '1.0.0');

// Настройки разработки
define('DEBUG_MODE', true); // Установите false для продакшена
define('SHOW_ERRORS', true); // Установите false для продакшена

// Настройки API
define('API_ENABLED', true);
define('API_RATE_LIMIT', 100); // Запросов в минуту
define('API_CACHE_TIME', 3600); // Время кэширования в секундах

// Настройки поиска
define('SEARCH_MIN_LENGTH', 2);
define('SEARCH_MAX_RESULTS', 50);
define('SEARCH_SUGGESTIONS_LIMIT', 10);

// Настройки отображения
define('COMMANDS_PER_PAGE', 20);
define('PACKAGES_PER_PAGE', 12);
define('TUTORIALS_PER_PAGE', 8);

// Настройки кэширования
define('CACHE_ENABLED', true);
define('CACHE_DIR', __DIR__ . '/cache/');
define('CACHE_TIME', 3600);

// Настройки безопасности
define('CSRF_PROTECTION', true);
define('XSS_PROTECTION', true);
define('CONTENT_SECURITY_POLICY', true);

// Настройки аналитики
define('GOOGLE_ANALYTICS_ID', ''); // Добавьте ваш GA ID
define('YANDEX_METRIKA_ID', ''); // Добавьте ваш Yandex Metrika ID

// Настройки социальных сетей
define('TELEGRAM_CHANNEL', '@termux_guide');
define('VK_GROUP', 'termux_guide');
define('GITHUB_REPO', 'https://github.com/your-username/termux-guide');

// Настройки контактов
define('CONTACT_EMAIL', 'support@termux-guide.com');
define('CONTACT_TELEGRAM', '@termux_guide');

// Настройки темы
define('DEFAULT_THEME', 'light'); // light или dark
define('THEME_TOGGLE_ENABLED', true);

// Настройки производительности
define('MINIFY_CSS', false); // Установите true для продакшена
define('MINIFY_JS', false); // Установите true для продакшена
define('ENABLE_GZIP', true);
define('ENABLE_CACHE_HEADERS', true);

// Настройки локализации
define('DEFAULT_LANGUAGE', 'ru');
define('SUPPORTED_LANGUAGES', ['ru', 'en']);

// Настройки базы данных (если используется)
define('DB_HOST', 'localhost');
define('DB_NAME', 'termux_guide');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Настройки почты (если используется)
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', '');
define('SMTP_PASS', '');
define('SMTP_SECURE', 'tls');

// Функции конфигурации

/**
 * Получить настройку
 */
function getConfig($key, $default = null) {
    return defined($key) ? constant($key) : $default;
}

/**
 * Проверить, включен ли режим отладки
 */
function isDebugMode() {
    return getConfig('DEBUG_MODE', false);
}

/**
 * Проверить, включен ли режим продакшена
 */
function isProduction() {
    return !isDebugMode();
}

/**
 * Получить URL сайта
 */
function getSiteUrl() {
    return getConfig('SITE_URL', 'http://localhost:8000');
}

/**
 * Получить полный URL для ресурса
 */
function getAssetUrl($path) {
    return getSiteUrl() . '/' . ltrim($path, '/');
}

/**
 * Получить настройки для API
 */
function getApiConfig() {
    return [
        'enabled' => getConfig('API_ENABLED', true),
        'rate_limit' => getConfig('API_RATE_LIMIT', 100),
        'cache_time' => getConfig('API_CACHE_TIME', 3600)
    ];
}

/**
 * Получить настройки поиска
 */
function getSearchConfig() {
    return [
        'min_length' => getConfig('SEARCH_MIN_LENGTH', 2),
        'max_results' => getConfig('SEARCH_MAX_RESULTS', 50),
        'suggestions_limit' => getConfig('SEARCH_SUGGESTIONS_LIMIT', 10)
    ];
}

/**
 * Получить настройки отображения
 */
function getDisplayConfig() {
    return [
        'commands_per_page' => getConfig('COMMANDS_PER_PAGE', 20),
        'packages_per_page' => getConfig('PACKAGES_PER_PAGE', 12),
        'tutorials_per_page' => getConfig('TUTORIALS_PER_PAGE', 8)
    ];
}

/**
 * Получить настройки безопасности
 */
function getSecurityConfig() {
    return [
        'csrf_protection' => getConfig('CSRF_PROTECTION', true),
        'xss_protection' => getConfig('XSS_PROTECTION', true),
        'csp_enabled' => getConfig('CONTENT_SECURITY_POLICY', true)
    ];
}

/**
 * Получить настройки аналитики
 */
function getAnalyticsConfig() {
    return [
        'google_analytics_id' => getConfig('GOOGLE_ANALYTICS_ID', ''),
        'yandex_metrika_id' => getConfig('YANDEX_METRIKA_ID', '')
    ];
}

/**
 * Получить настройки социальных сетей
 */
function getSocialConfig() {
    return [
        'telegram' => getConfig('TELEGRAM_CHANNEL', '@termux_guide'),
        'vk' => getConfig('VK_GROUP', 'termux_guide'),
        'github' => getConfig('GITHUB_REPO', 'https://github.com/your-username/termux-guide')
    ];
}

/**
 * Получить настройки контактов
 */
function getContactConfig() {
    return [
        'email' => getConfig('CONTACT_EMAIL', 'support@termux-guide.com'),
        'telegram' => getConfig('CONTACT_TELEGRAM', '@termux_guide')
    ];
}

/**
 * Получить настройки темы
 */
function getThemeConfig() {
    return [
        'default' => getConfig('DEFAULT_THEME', 'light'),
        'toggle_enabled' => getConfig('THEME_TOGGLE_ENABLED', true)
    ];
}

/**
 * Получить настройки производительности
 */
function getPerformanceConfig() {
    return [
        'minify_css' => getConfig('MINIFY_CSS', false),
        'minify_js' => getConfig('MINIFY_JS', false),
        'enable_gzip' => getConfig('ENABLE_GZIP', true),
        'enable_cache_headers' => getConfig('ENABLE_CACHE_HEADERS', true)
    ];
}

/**
 * Получить настройки локализации
 */
function getLocalizationConfig() {
    return [
        'default_language' => getConfig('DEFAULT_LANGUAGE', 'ru'),
        'supported_languages' => getConfig('SUPPORTED_LANGUAGES', ['ru', 'en'])
    ];
}

// Инициализация настроек

// Установка временной зоны
date_default_timezone_set('Europe/Moscow');

// Установка локали
setlocale(LC_ALL, 'ru_RU.UTF-8');

// Настройка обработки ошибок
if (isDebugMode()) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Создание директории кэша, если она не существует
if (getConfig('CACHE_ENABLED', true) && !is_dir(getConfig('CACHE_DIR'))) {
    mkdir(getConfig('CACHE_DIR'), 0755, true);
}

// Функция для логирования
function logMessage($message, $level = 'INFO') {
    if (isDebugMode()) {
        $logFile = __DIR__ . '/logs/app.log';
        $logDir = dirname($logFile);
        
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }
        
        $timestamp = date('Y-m-d H:i:s');
        $logEntry = "[$timestamp] [$level] $message" . PHP_EOL;
        
        file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
    }
}

// Функция для очистки кэша
function clearCache() {
    $cacheDir = getConfig('CACHE_DIR');
    if (is_dir($cacheDir)) {
        $files = glob($cacheDir . '*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        logMessage('Cache cleared');
    }
}

// Функция для получения информации о системе
function getSystemInfo() {
    return [
        'php_version' => PHP_VERSION,
        'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
        'memory_limit' => ini_get('memory_limit'),
        'max_execution_time' => ini_get('max_execution_time'),
        'upload_max_filesize' => ini_get('upload_max_filesize'),
        'post_max_size' => ini_get('post_max_size')
    ];
}

// Функция для проверки требований системы
function checkSystemRequirements() {
    $requirements = [
        'php_version' => version_compare(PHP_VERSION, '7.4.0', '>='),
        'json_extension' => extension_loaded('json'),
        'mbstring_extension' => extension_loaded('mbstring'),
        'curl_extension' => extension_loaded('curl')
    ];
    
    $failed = array_filter($requirements, function($met) {
        return !$met;
    });
    
    return [
        'met' => empty($failed),
        'requirements' => $requirements,
        'failed' => array_keys($failed)
    ];
}

// Проверка требований при загрузке
$systemCheck = checkSystemRequirements();
if (!$systemCheck['met']) {
    logMessage('System requirements not met: ' . implode(', ', $systemCheck['failed']), 'ERROR');
}

// Функция для получения статистики сайта
function getSiteStats() {
    return [
        'version' => getConfig('SITE_VERSION', '1.0.0'),
        'commands_count' => 50, // Обновите на реальное количество
        'packages_count' => 100, // Обновите на реальное количество
        'tutorials_count' => 25, // Обновите на реальное количество
        'last_updated' => date('Y-m-d H:i:s')
    ];
}

// Функция для валидации входных данных
function validateInput($data, $rules = []) {
    $errors = [];
    
    foreach ($rules as $field => $rule) {
        if (!isset($data[$field]) || empty($data[$field])) {
            if (strpos($rule, 'required') !== false) {
                $errors[$field] = "Поле '$field' обязательно для заполнения";
            }
            continue;
        }
        
        $value = $data[$field];
        
        if (strpos($rule, 'min:') !== false) {
            preg_match('/min:(\d+)/', $rule, $matches);
            $min = (int)$matches[1];
            if (strlen($value) < $min) {
                $errors[$field] = "Поле '$field' должно содержать минимум $min символов";
            }
        }
        
        if (strpos($rule, 'max:') !== false) {
            preg_match('/max:(\d+)/', $rule, $matches);
            $max = (int)$matches[1];
            if (strlen($value) > $max) {
                $errors[$field] = "Поле '$field' должно содержать максимум $max символов";
            }
        }
        
        if (strpos($rule, 'email') !== false) {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $errors[$field] = "Поле '$field' должно содержать корректный email";
            }
        }
    }
    
    return $errors;
}

// Функция для санитизации данных
function sanitizeInput($data) {
    if (is_array($data)) {
        return array_map('sanitizeInput', $data);
    }
    
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Функция для генерации CSRF токена
function generateCSRFToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Функция для проверки CSRF токена
function verifyCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Инициализация сессии для CSRF защиты
if (getConfig('CSRF_PROTECTION', true)) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

// Логирование загрузки конфигурации
logMessage('Configuration loaded successfully');

?>