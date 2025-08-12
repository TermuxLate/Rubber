<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');

// Database of Termux commands (in a real application, this would come from a database)
$commands = [
    [
        'id' => 1,
        'name' => 'pkg update',
        'category' => 'package',
        'description' => 'Обновляет список доступных пакетов из репозитория. Эта команда должна выполняться перед установкой новых пакетов.',
        'syntax' => 'pkg update',
        'examples' => [
            'pkg update',
            'pkg update && pkg upgrade'
        ],
        'details' => 'Команда pkg update синхронизирует локальную базу данных пакетов с удаленным репозиторием. Это необходимо для получения информации о новых версиях пакетов.',
        'tags' => ['пакеты', 'обновление', 'репозиторий']
    ],
    [
        'id' => 2,
        'name' => 'pkg upgrade',
        'category' => 'package',
        'description' => 'Обновляет все установленные пакеты до последних версий.',
        'syntax' => 'pkg upgrade',
        'examples' => [
            'pkg upgrade',
            'pkg upgrade -y'
        ],
        'details' => 'Обновляет все пакеты, которые имеют новые версии в репозитории. Флаг -y автоматически подтверждает все обновления.',
        'tags' => ['пакеты', 'обновление', 'система']
    ],
    [
        'id' => 3,
        'name' => 'pkg install',
        'category' => 'package',
        'description' => 'Устанавливает указанные пакеты из репозитория.',
        'syntax' => 'pkg install [пакет1] [пакет2] ...',
        'examples' => [
            'pkg install python',
            'pkg install git vim nano',
            'pkg install -y nodejs'
        ],
        'details' => 'Устанавливает один или несколько пакетов. Флаг -y автоматически подтверждает установку без запроса подтверждения.',
        'tags' => ['пакеты', 'установка', 'программы']
    ],
    [
        'id' => 4,
        'name' => 'ls',
        'category' => 'file',
        'description' => 'Показывает содержимое текущей директории.',
        'syntax' => 'ls [опции] [путь]',
        'examples' => [
            'ls',
            'ls -la',
            'ls -lh',
            'ls /home'
        ],
        'details' => 'Основная команда для просмотра файлов и папок. -l показывает подробную информацию, -a показывает скрытые файлы, -h показывает размеры в человекочитаемом формате.',
        'tags' => ['файлы', 'директории', 'просмотр']
    ],
    [
        'id' => 5,
        'name' => 'cd',
        'category' => 'file',
        'description' => 'Изменяет текущую рабочую директорию.',
        'syntax' => 'cd [путь]',
        'examples' => [
            'cd /home',
            'cd ..',
            'cd ~',
            'cd Downloads'
        ],
        'details' => 'Переход в указанную директорию. .. - переход на уровень выше, ~ - переход в домашнюю директорию.',
        'tags' => ['навигация', 'директории', 'путь']
    ],
    [
        'id' => 6,
        'name' => 'ping',
        'category' => 'network',
        'description' => 'Проверяет доступность сетевого узла.',
        'syntax' => 'ping [опции] [хост]',
        'examples' => [
            'ping google.com',
            'ping -c 4 8.8.8.8',
            'ping -i 2 google.com'
        ],
        'details' => 'Отправляет ICMP пакеты для проверки доступности хоста. -c ограничивает количество пакетов, -i устанавливает интервал.',
        'tags' => ['сеть', 'проверка', 'доступность']
    ],
    [
        'id' => 7,
        'name' => 'ssh',
        'category' => 'network',
        'description' => 'Подключается к удаленному серверу по SSH.',
        'syntax' => 'ssh [опции] [пользователь@]хост',
        'examples' => [
            'ssh user@192.168.1.100',
            'ssh -p 2222 user@example.com',
            'ssh -i key.pem user@server.com'
        ],
        'details' => 'Устанавливает защищенное соединение с удаленным сервером. -p указывает порт, -i указывает файл ключа.',
        'tags' => ['сеть', 'безопасность', 'подключение']
    ],
    [
        'id' => 8,
        'name' => 'ps',
        'category' => 'system',
        'description' => 'Показывает запущенные процессы.',
        'syntax' => 'ps [опции]',
        'examples' => [
            'ps aux',
            'ps -ef',
            'ps aux | grep python'
        ],
        'details' => 'Отображает информацию о запущенных процессах. aux показывает все процессы пользователей, -ef показывает все процессы.',
        'tags' => ['система', 'процессы', 'мониторинг']
    ],
    [
        'id' => 9,
        'name' => 'top',
        'category' => 'system',
        'description' => 'Показывает динамическую информацию о процессах и использовании системы.',
        'syntax' => 'top [опции]',
        'examples' => [
            'top',
            'top -p 1234',
            'top -u username'
        ],
        'details' => 'Интерактивный монитор процессов в реальном времени. Показывает CPU, память и другие системные ресурсы.',
        'tags' => ['система', 'мониторинг', 'ресурсы']
    ],
    [
        'id' => 10,
        'name' => 'whoami',
        'category' => 'basic',
        'description' => 'Показывает имя текущего пользователя.',
        'syntax' => 'whoami',
        'examples' => [
            'whoami'
        ],
        'details' => 'Выводит имя пользователя, под которым выполняется текущий процесс.',
        'tags' => ['пользователь', 'система', 'информация']
    ]
];

// Get request method
$method = $_SERVER['REQUEST_METHOD'];

// Handle different request types
switch ($method) {
    case 'GET':
        handleGetRequest();
        break;
    case 'POST':
        handlePostRequest();
        break;
    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}

function handleGetRequest() {
    global $commands;
    
    $action = $_GET['action'] ?? 'list';
    $category = $_GET['category'] ?? null;
    $search = $_GET['search'] ?? null;
    $limit = (int)($_GET['limit'] ?? 50);
    
    switch ($action) {
        case 'list':
            $result = filterCommands($commands, $category, $search, $limit);
            echo json_encode([
                'success' => true,
                'data' => $result,
                'total' => count($result),
                'filters' => [
                    'category' => $category,
                    'search' => $search,
                    'limit' => $limit
                ]
            ]);
            break;
            
        case 'categories':
            $categories = getCategories($commands);
            echo json_encode([
                'success' => true,
                'data' => $categories
            ]);
            break;
            
        case 'random':
            $randomCommands = getRandomCommands($commands, $limit);
            echo json_encode([
                'success' => true,
                'data' => $randomCommands
            ]);
            break;
            
        case 'popular':
            $popularCommands = getPopularCommands($commands, $limit);
            echo json_encode([
                'success' => true,
                'data' => $popularCommands
            ]);
            break;
            
        default:
            http_response_code(400);
            echo json_encode(['error' => 'Invalid action']);
            break;
    }
}

function handlePostRequest() {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!$input) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid JSON']);
        return;
    }
    
    $action = $input['action'] ?? '';
    
    switch ($action) {
        case 'search':
            $query = $input['query'] ?? '';
            $category = $input['category'] ?? null;
            $limit = (int)($input['limit'] ?? 50);
            
            global $commands;
            $result = filterCommands($commands, $category, $query, $limit);
            
            echo json_encode([
                'success' => true,
                'data' => $result,
                'total' => count($result),
                'query' => $query
            ]);
            break;
            
        case 'suggest':
            $query = $input['query'] ?? '';
            $suggestions = getSuggestions($query);
            
            echo json_encode([
                'success' => true,
                'data' => $suggestions
            ]);
            break;
            
        default:
            http_response_code(400);
            echo json_encode(['error' => 'Invalid action']);
            break;
    }
}

function filterCommands($commands, $category = null, $search = null, $limit = 50) {
    $filtered = $commands;
    
    // Filter by category
    if ($category && $category !== 'all') {
        $filtered = array_filter($filtered, function($cmd) use ($category) {
            return $cmd['category'] === $category;
        });
    }
    
    // Filter by search query
    if ($search) {
        $search = mb_strtolower($search, 'UTF-8');
        $filtered = array_filter($filtered, function($cmd) use ($search) {
            return mb_strpos(mb_strtolower($cmd['name'], 'UTF-8'), $search) !== false ||
                   mb_strpos(mb_strtolower($cmd['description'], 'UTF-8'), $search) !== false ||
                   mb_strpos(mb_strtolower(implode(' ', $cmd['tags']), 'UTF-8'), $search) !== false;
        });
    }
    
    // Apply limit
    $filtered = array_slice($filtered, 0, $limit);
    
    return array_values($filtered);
}

function getCategories($commands) {
    $categories = [];
    foreach ($commands as $command) {
        $cat = $command['category'];
        if (!isset($categories[$cat])) {
            $categories[$cat] = [
                'name' => $cat,
                'display_name' => getCategoryDisplayName($cat),
                'count' => 0
            ];
        }
        $categories[$cat]['count']++;
    }
    
    return array_values($categories);
}

function getCategoryDisplayName($category) {
    $names = [
        'basic' => 'Основные',
        'package' => 'Пакеты',
        'file' => 'Файлы',
        'network' => 'Сеть',
        'system' => 'Система'
    ];
    
    return $names[$category] ?? $category;
}

function getRandomCommands($commands, $limit = 5) {
    shuffle($commands);
    return array_slice($commands, 0, $limit);
}

function getPopularCommands($commands, $limit = 10) {
    // In a real application, this would be based on usage statistics
    // For now, we'll return the first N commands
    return array_slice($commands, 0, $limit);
}

function getSuggestions($query) {
    global $commands;
    
    if (strlen($query) < 2) {
        return [];
    }
    
    $suggestions = [];
    $query = mb_strtolower($query, 'UTF-8');
    
    foreach ($commands as $command) {
        if (mb_strpos(mb_strtolower($command['name'], 'UTF-8'), $query) !== false) {
            $suggestions[] = [
                'type' => 'command',
                'value' => $command['name'],
                'description' => $command['description']
            ];
        }
    }
    
    // Add tag-based suggestions
    $tags = [];
    foreach ($commands as $command) {
        foreach ($command['tags'] as $tag) {
            if (mb_strpos(mb_strtolower($tag, 'UTF-8'), $query) !== false) {
                $tags[] = $tag;
            }
        }
    }
    
    $tags = array_unique($tags);
    foreach ($tags as $tag) {
        $suggestions[] = [
            'type' => 'tag',
            'value' => $tag,
            'description' => "Поиск по тегу: $tag"
        ];
    }
    
    return array_slice($suggestions, 0, 10);
}

// Error handling
function handleError($message, $code = 500) {
    http_response_code($code);
    echo json_encode([
        'error' => $message,
        'timestamp' => date('Y-m-d H:i:s')
    ]);
}

// Set error handler
set_error_handler(function($severity, $message, $file, $line) {
    handleError("Internal server error: $message", 500);
});

// Handle exceptions
set_exception_handler(function($exception) {
    handleError("Exception: " . $exception->getMessage(), 500);
});
?>