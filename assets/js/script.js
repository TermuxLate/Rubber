// Termux Commands Database
const commandsData = [
    {
        name: "pkg update",
        category: "package",
        description: "Обновляет список доступных пакетов из репозитория. Эта команда должна выполняться перед установкой новых пакетов.",
        syntax: "pkg update",
        examples: [
            "pkg update",
            "pkg update && pkg upgrade"
        ],
        details: "Команда pkg update синхронизирует локальную базу данных пакетов с удаленным репозиторием. Это необходимо для получения информации о новых версиях пакетов."
    },
    {
        name: "pkg upgrade",
        category: "package",
        description: "Обновляет все установленные пакеты до последних версий.",
        syntax: "pkg upgrade",
        examples: [
            "pkg upgrade",
            "pkg upgrade -y"
        ],
        details: "Обновляет все пакеты, которые имеют новые версии в репозитории. Флаг -y автоматически подтверждает все обновления."
    },
    {
        name: "pkg install",
        category: "package",
        description: "Устанавливает указанные пакеты из репозитория.",
        syntax: "pkg install [пакет1] [пакет2] ...",
        examples: [
            "pkg install python",
            "pkg install git vim nano",
            "pkg install -y nodejs"
        ],
        details: "Устанавливает один или несколько пакетов. Флаг -y автоматически подтверждает установку без запроса подтверждения."
    },
    {
        name: "pkg remove",
        category: "package",
        description: "Удаляет указанные пакеты из системы.",
        syntax: "pkg remove [пакет1] [пакет2] ...",
        examples: [
            "pkg remove python",
            "pkg remove -y git"
        ],
        details: "Удаляет пакеты и их зависимости, которые больше не нужны. Флаг -y автоматически подтверждает удаление."
    },
    {
        name: "pkg search",
        category: "package",
        description: "Ищет пакеты в репозитории по ключевому слову.",
        syntax: "pkg search [ключевое_слово]",
        examples: [
            "pkg search python",
            "pkg search editor",
            "pkg search -i python"
        ],
        details: "Поиск пакетов по имени или описанию. Флаг -i делает поиск нечувствительным к регистру."
    },
    {
        name: "pkg list-installed",
        category: "package",
        description: "Показывает список всех установленных пакетов.",
        syntax: "pkg list-installed",
        examples: [
            "pkg list-installed",
            "pkg list-installed | grep python"
        ],
        details: "Выводит список всех установленных пакетов с их версиями."
    },
    {
        name: "ls",
        category: "file",
        description: "Показывает содержимое текущей директории.",
        syntax: "ls [опции] [путь]",
        examples: [
            "ls",
            "ls -la",
            "ls -lh",
            "ls /home"
        ],
        details: "Основная команда для просмотра файлов и папок. -l показывает подробную информацию, -a показывает скрытые файлы, -h показывает размеры в человекочитаемом формате."
    },
    {
        name: "cd",
        category: "file",
        description: "Изменяет текущую рабочую директорию.",
        syntax: "cd [путь]",
        examples: [
            "cd /home",
            "cd ..",
            "cd ~",
            "cd Downloads"
        ],
        details: "Переход в указанную директорию. .. - переход на уровень выше, ~ - переход в домашнюю директорию."
    },
    {
        name: "pwd",
        category: "file",
        description: "Показывает полный путь к текущей рабочей директории.",
        syntax: "pwd",
        examples: [
            "pwd",
            "pwd -P"
        ],
        details: "Выводит абсолютный путь к текущей директории. Флаг -P показывает физический путь без символических ссылок."
    },
    {
        name: "mkdir",
        category: "file",
        description: "Создает новую директорию.",
        syntax: "mkdir [опции] [имя_директории]",
        examples: [
            "mkdir myfolder",
            "mkdir -p parent/child/grandchild",
            "mkdir -m 755 newdir"
        ],
        details: "Создает директорию с указанным именем. -p создает родительские директории при необходимости, -m устанавливает права доступа."
    },
    {
        name: "rm",
        category: "file",
        description: "Удаляет файлы и директории.",
        syntax: "rm [опции] [файл/директория]",
        examples: [
            "rm file.txt",
            "rm -r directory",
            "rm -f file.txt",
            "rm -rf directory"
        ],
        details: "Удаляет файлы и директории. -r рекурсивно удаляет директории, -f принудительно удаляет без подтверждения."
    },
    {
        name: "cp",
        category: "file",
        description: "Копирует файлы и директории.",
        syntax: "cp [опции] [источник] [назначение]",
        examples: [
            "cp file.txt backup.txt",
            "cp -r directory backup/",
            "cp -v file.txt /home/user/"
        ],
        details: "Копирует файлы и директории. -r рекурсивно копирует директории, -v показывает подробную информацию о копировании."
    },
    {
        name: "mv",
        category: "file",
        description: "Перемещает или переименовывает файлы и директории.",
        syntax: "mv [опции] [источник] [назначение]",
        examples: [
            "mv oldname.txt newname.txt",
            "mv file.txt /home/user/",
            "mv -i file.txt backup/"
        ],
        details: "Перемещает или переименовывает файлы и директории. -i запрашивает подтверждение перед перезаписью."
    },
    {
        name: "cat",
        category: "file",
        description: "Показывает содержимое файлов.",
        syntax: "cat [опции] [файл]",
        examples: [
            "cat file.txt",
            "cat file1.txt file2.txt",
            "cat -n file.txt"
        ],
        details: "Выводит содержимое файлов в терминал. -n добавляет номера строк."
    },
    {
        name: "nano",
        category: "file",
        description: "Простой текстовый редактор в терминале.",
        syntax: "nano [опции] [файл]",
        examples: [
            "nano file.txt",
            "nano -w file.txt",
            "nano +10 file.txt"
        ],
        details: "Открывает файл в редакторе nano. -w отключает перенос строк, +10 открывает файл на 10-й строке."
    },
    {
        name: "vim",
        category: "file",
        description: "Мощный текстовый редактор с множеством функций.",
        syntax: "vim [опции] [файл]",
        examples: [
            "vim file.txt",
            "vim +10 file.txt",
            "vim -R file.txt"
        ],
        details: "Открывает файл в редакторе vim. +10 открывает файл на 10-й строке, -R открывает в режиме только для чтения."
    },
    {
        name: "chmod",
        category: "file",
        description: "Изменяет права доступа к файлам и директориям.",
        syntax: "chmod [опции] [права] [файл/директория]",
        examples: [
            "chmod 755 file.txt",
            "chmod +x script.sh",
            "chmod -R 644 directory/"
        ],
        details: "Изменяет права доступа. 755 = rwxr-xr-x, +x добавляет право на выполнение, -R применяет рекурсивно."
    },
    {
        name: "ping",
        category: "network",
        description: "Проверяет доступность сетевого узла.",
        syntax: "ping [опции] [хост]",
        examples: [
            "ping google.com",
            "ping -c 4 8.8.8.8",
            "ping -i 2 google.com"
        ],
        details: "Отправляет ICMP пакеты для проверки доступности хоста. -c ограничивает количество пакетов, -i устанавливает интервал."
    },
    {
        name: "wget",
        category: "network",
        description: "Загружает файлы из интернета.",
        syntax: "wget [опции] [URL]",
        examples: [
            "wget https://example.com/file.zip",
            "wget -O filename.zip https://example.com/file.zip",
            "wget -c https://example.com/file.zip"
        ],
        details: "Загружает файлы по HTTP/HTTPS. -O указывает имя файла, -c продолжает загрузку с места обрыва."
    },
    {
        name: "curl",
        category: "network",
        description: "Передает данные с сервера или на сервер.",
        syntax: "curl [опции] [URL]",
        examples: [
            "curl https://example.com",
            "curl -O https://example.com/file.zip",
            "curl -X POST -d 'data' https://api.example.com"
        ],
        details: "Мощный инструмент для работы с HTTP запросами. -O сохраняет файл, -X указывает метод HTTP."
    },
    {
        name: "ssh",
        category: "network",
        description: "Подключается к удаленному серверу по SSH.",
        syntax: "ssh [опции] [пользователь@]хост",
        examples: [
            "ssh user@192.168.1.100",
            "ssh -p 2222 user@example.com",
            "ssh -i key.pem user@server.com"
        ],
        details: "Устанавливает защищенное соединение с удаленным сервером. -p указывает порт, -i указывает файл ключа."
    },
    {
        name: "scp",
        category: "network",
        description: "Копирует файлы между локальной и удаленной системами по SSH.",
        syntax: "scp [опции] [источник] [назначение]",
        examples: [
            "scp file.txt user@server:/home/user/",
            "scp -r directory/ user@server:/home/user/",
            "scp user@server:/home/user/file.txt ."
        ],
        details: "Безопасное копирование файлов по SSH. -r рекурсивно копирует директории."
    },
    {
        name: "nmap",
        category: "network",
        description: "Сканирует сеть и порты.",
        syntax: "nmap [опции] [цель]",
        examples: [
            "nmap localhost",
            "nmap -p 80,443 example.com",
            "nmap -sP 192.168.1.0/24"
        ],
        details: "Сканер портов и сетевой безопасности. -p указывает порты, -sP выполняет ping сканирование."
    },
    {
        name: "ifconfig",
        category: "network",
        description: "Показывает конфигурацию сетевых интерфейсов.",
        syntax: "ifconfig [интерфейс]",
        examples: [
            "ifconfig",
            "ifconfig wlan0",
            "ifconfig wlan0 up"
        ],
        details: "Отображает информацию о сетевых интерфейсах, IP адресах и статистике."
    },
    {
        name: "ps",
        category: "system",
        description: "Показывает запущенные процессы.",
        syntax: "ps [опции]",
        examples: [
            "ps aux",
            "ps -ef",
            "ps aux | grep python"
        ],
        details: "Отображает информацию о запущенных процессах. aux показывает все процессы пользователей, -ef показывает все процессы."
    },
    {
        name: "top",
        category: "system",
        description: "Показывает динамическую информацию о процессах и использовании системы.",
        syntax: "top [опции]",
        examples: [
            "top",
            "top -p 1234",
            "top -u username"
        ],
        details: "Интерактивный монитор процессов в реальном времени. Показывает CPU, память и другие системные ресурсы."
    },
    {
        name: "kill",
        category: "system",
        description: "Завершает процессы по PID.",
        syntax: "kill [сигнал] [PID]",
        examples: [
            "kill 1234",
            "kill -9 1234",
            "kill -TERM 1234"
        ],
        details: "Отправляет сигнал процессу для его завершения. -9 принудительно завершает процесс."
    },
    {
        name: "df",
        category: "system",
        description: "Показывает информацию о использовании дискового пространства.",
        syntax: "df [опции] [файловая_система]",
        examples: [
            "df -h",
            "df -T",
            "df /home"
        ],
        details: "Отображает информацию о свободном месте на дисках. -h показывает размеры в человекочитаемом формате."
    },
    {
        name: "du",
        category: "system",
        description: "Показывает размер файлов и директорий.",
        syntax: "du [опции] [путь]",
        examples: [
            "du -h",
            "du -sh directory/",
            "du -h --max-depth=2"
        ],
        details: "Показывает размер файлов и директорий. -h человекочитаемый формат, -s суммарный размер."
    },
    {
        name: "free",
        category: "system",
        description: "Показывает информацию об использовании памяти.",
        syntax: "free [опции]",
        examples: [
            "free -h",
            "free -m",
            "free -s 5"
        ],
        details: "Отображает информацию о RAM и swap памяти. -h человекочитаемый формат, -s обновляет каждые N секунд."
    },
    {
        name: "uname",
        category: "system",
        description: "Показывает информацию о системе.",
        syntax: "uname [опции]",
        examples: [
            "uname -a",
            "uname -s",
            "uname -r"
        ],
        details: "Выводит информацию о системе. -a показывает всю информацию, -s показывает имя ОС, -r показывает версию ядра."
    },
    {
        name: "whoami",
        category: "basic",
        description: "Показывает имя текущего пользователя.",
        syntax: "whoami",
        examples: [
            "whoami"
        ],
        details: "Выводит имя пользователя, под которым выполняется текущий процесс."
    },
    {
        name: "date",
        category: "basic",
        description: "Показывает текущую дату и время.",
        syntax: "date [опции]",
        examples: [
            "date",
            "date +%Y-%m-%d",
            "date +%H:%M:%S"
        ],
        details: "Отображает текущую дату и время. Можно форматировать вывод с помощью спецификаторов формата."
    },
    {
        name: "clear",
        category: "basic",
        description: "Очищает экран терминала.",
        syntax: "clear",
        examples: [
            "clear",
            "Ctrl+L"
        ],
        details: "Очищает экран терминала. Также можно использовать Ctrl+L."
    },
    {
        name: "history",
        category: "basic",
        description: "Показывает историю выполненных команд.",
        syntax: "history [опции]",
        examples: [
            "history",
            "history 10",
            "history | grep python"
        ],
        details: "Отображает список ранее выполненных команд. Можно ограничить количество команд числом."
    },
    {
        name: "echo",
        category: "basic",
        description: "Выводит текст в терминал.",
        syntax: "echo [опции] [строка]",
        examples: [
            "echo Hello World",
            "echo $PATH",
            "echo -e \"Hello\\nWorld\""
        ],
        details: "Выводит указанный текст в терминал. -e интерпретирует escape-последовательности."
    },
    {
        name: "grep",
        category: "basic",
        description: "Ищет текст в файлах или выводе команд.",
        syntax: "grep [опции] [шаблон] [файл]",
        examples: [
            "grep \"text\" file.txt",
            "grep -i \"text\" file.txt",
            "ps aux | grep python"
        ],
        details: "Ищет строки, содержащие указанный шаблон. -i игнорирует регистр, -r рекурсивно ищет в директориях."
    }
];

// DOM Elements
const navToggle = document.getElementById('nav-toggle');
const navMenu = document.getElementById('nav-menu');
const searchInput = document.getElementById('search-input');
const searchBtn = document.getElementById('search-btn');
const commandsGrid = document.getElementById('commands-grid');
const filterBtns = document.querySelectorAll('.filter-btn');
const modal = document.getElementById('command-modal');
const modalContent = document.getElementById('modal-content');
const closeBtn = document.querySelector('.close');
const notification = document.getElementById('notification');
const copyBtns = document.querySelectorAll('.copy-btn');

// Mobile Navigation
navToggle.addEventListener('click', () => {
    navMenu.classList.toggle('active');
    navToggle.classList.toggle('active');
});

// Close mobile menu when clicking on a link
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
        navMenu.classList.remove('active');
        navToggle.classList.remove('active');
    });
});

// Initialize commands display
function initCommands() {
    displayCommands(commandsData);
}

// Display commands in grid
function displayCommands(commands) {
    commandsGrid.innerHTML = '';
    
    commands.forEach(command => {
        const commandCard = document.createElement('div');
        commandCard.className = 'command-card scroll-animate';
        commandCard.innerHTML = `
            <div class="command-header">
                <div class="command-name">${command.name}</div>
                <div class="command-category">${getCategoryName(command.category)}</div>
            </div>
            <div class="command-description">${command.description}</div>
            <div class="command-syntax">
                <code>${command.syntax}</code>
            </div>
            <div class="command-examples">
                ${command.examples.map(example => `
                    <div class="example-item">${example}</div>
                `).join('')}
            </div>
        `;
        
        commandCard.addEventListener('click', () => {
            showCommandModal(command);
        });
        
        commandsGrid.appendChild(commandCard);
    });
    
    // Trigger scroll animations
    setTimeout(() => {
        document.querySelectorAll('.scroll-animate').forEach(el => {
            el.classList.add('animate');
        });
    }, 100);
}

// Get category name in Russian
function getCategoryName(category) {
    const categories = {
        'basic': 'Основные',
        'package': 'Пакеты',
        'file': 'Файлы',
        'network': 'Сеть',
        'system': 'Система'
    };
    return categories[category] || category;
}

// Show command modal
function showCommandModal(command) {
    modalContent.innerHTML = `
        <h2>${command.name}</h2>
        <div class="command-category">${getCategoryName(command.category)}</div>
        <p><strong>Описание:</strong> ${command.description}</p>
        <div class="command-syntax">
            <strong>Синтаксис:</strong>
            <code>${command.syntax}</code>
        </div>
        <div class="command-examples">
            <strong>Примеры:</strong>
            ${command.examples.map(example => `
                <div class="example-item">${example}</div>
            `).join('')}
        </div>
        <div class="command-details">
            <strong>Подробности:</strong>
            <p>${command.details}</p>
        </div>
    `;
    
    modal.style.display = 'block';
    document.body.style.overflow = 'hidden';
}

// Close modal
function closeModal() {
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Close modal when clicking on X or outside
closeBtn.addEventListener('click', closeModal);
modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        closeModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.style.display === 'block') {
        closeModal();
    }
});

// Search functionality
function searchCommands(query) {
    const filteredCommands = commandsData.filter(command => 
        command.name.toLowerCase().includes(query.toLowerCase()) ||
        command.description.toLowerCase().includes(query.toLowerCase()) ||
        command.category.toLowerCase().includes(query.toLowerCase())
    );
    displayCommands(filteredCommands);
}

// Search input event
searchInput.addEventListener('input', (e) => {
    const query = e.target.value.trim();
    if (query.length > 0) {
        searchCommands(query);
    } else {
        displayCommands(commandsData);
    }
});

// Search button event
searchBtn.addEventListener('click', () => {
    const query = searchInput.value.trim();
    if (query.length > 0) {
        searchCommands(query);
    }
});

// Enter key in search input
searchInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        const query = e.target.value.trim();
        if (query.length > 0) {
            searchCommands(query);
        }
    }
});

// Filter functionality
filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        // Remove active class from all buttons
        filterBtns.forEach(b => b.classList.remove('active'));
        // Add active class to clicked button
        btn.classList.add('active');
        
        const category = btn.dataset.category;
        
        if (category === 'all') {
            displayCommands(commandsData);
        } else {
            const filteredCommands = commandsData.filter(command => 
                command.category === category
            );
            displayCommands(filteredCommands);
        }
    });
});

// Copy functionality
function copyToClipboard(text) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(() => {
            showNotification('Команда скопирована в буфер обмена!');
        }).catch(() => {
            fallbackCopyToClipboard(text);
        });
    } else {
        fallbackCopyToClipboard(text);
    }
}

function fallbackCopyToClipboard(text) {
    const textArea = document.createElement('textarea');
    textArea.value = text;
    textArea.style.position = 'fixed';
    textArea.style.left = '-999999px';
    textArea.style.top = '-999999px';
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    
    try {
        document.execCommand('copy');
        showNotification('Команда скопирована в буфер обмена!');
    } catch (err) {
        showNotification('Ошибка при копировании', 'error');
    }
    
    document.body.removeChild(textArea);
}

// Copy button events
document.addEventListener('click', (e) => {
    if (e.target.closest('.copy-btn')) {
        const btn = e.target.closest('.copy-btn');
        const command = btn.dataset.command;
        copyToClipboard(command);
    }
});

// Show notification
function showNotification(message, type = 'success') {
    const notificationEl = document.getElementById('notification');
    const notificationText = document.getElementById('notification-text');
    
    notificationText.textContent = message;
    
    // Change background color based on type
    if (type === 'error') {
        notificationEl.style.background = 'var(--danger-color)';
    } else if (type === 'warning') {
        notificationEl.style.background = 'var(--warning-color)';
    } else {
        notificationEl.style.background = 'var(--success-color)';
    }
    
    notificationEl.classList.add('show');
    
    setTimeout(() => {
        notificationEl.classList.remove('show');
    }, 3000);
}

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Scroll animations
function handleScrollAnimations() {
    const elements = document.querySelectorAll('.scroll-animate');
    
    elements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;
        
        if (elementTop < window.innerHeight - elementVisible) {
            element.classList.add('animate');
        }
    });
}

// Intersection Observer for better performance
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate');
        }
    });
}, observerOptions);

// Observe all scroll-animate elements
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.scroll-animate').forEach(el => {
        observer.observe(el);
    });
});

// Header scroll effect
function handleHeaderScroll() {
    const header = document.querySelector('.header');
    if (window.scrollY > 100) {
        header.style.background = 'rgba(255, 255, 255, 0.98)';
        header.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
    } else {
        header.style.background = 'rgba(255, 255, 255, 0.95)';
        header.style.boxShadow = 'none';
    }
}

// Terminal animation
function animateTerminal() {
    const terminalLines = document.querySelectorAll('.terminal-line');
    let delay = 0;
    
    terminalLines.forEach(line => {
        setTimeout(() => {
            line.style.opacity = '1';
            line.style.transform = 'translateX(0)';
        }, delay);
        delay += 500;
    });
}

// Initialize everything when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    initCommands();
    animateTerminal();
    
    // Add scroll event listeners
    window.addEventListener('scroll', () => {
        handleScrollAnimations();
        handleHeaderScroll();
    });
    
    // Initial header state
    handleHeaderScroll();
    
    // Add loading animation to search
    searchBtn.addEventListener('click', () => {
        const originalContent = searchBtn.innerHTML;
        searchBtn.innerHTML = '<div class="loading"></div>';
        
        setTimeout(() => {
            searchBtn.innerHTML = originalContent;
        }, 1000);
    });
});

// Keyboard shortcuts
document.addEventListener('keydown', (e) => {
    // Ctrl/Cmd + K to focus search
    if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
        e.preventDefault();
        searchInput.focus();
    }
    
    // Ctrl/Cmd + / to show all commands
    if ((e.ctrlKey || e.metaKey) && e.key === '/') {
        e.preventDefault();
        searchInput.value = '';
        displayCommands(commandsData);
        filterBtns.forEach(btn => btn.classList.remove('active'));
        filterBtns[0].classList.add('active');
    }
});

// Add some interactive features
document.addEventListener('DOMContentLoaded', () => {
    // Add hover effects to command cards
    document.addEventListener('mouseover', (e) => {
        if (e.target.closest('.command-card')) {
            e.target.closest('.command-card').style.transform = 'translateY(-5px) scale(1.02)';
        }
    });
    
    document.addEventListener('mouseout', (e) => {
        if (e.target.closest('.command-card')) {
            e.target.closest('.command-card').style.transform = 'translateY(0) scale(1)';
        }
    });
    
    // Add click sound effect (optional)
    document.addEventListener('click', (e) => {
        if (e.target.closest('.btn, .command-card, .copy-btn')) {
            // You can add a subtle sound effect here if desired
            // playClickSound();
        }
    });
});

// Performance optimization: Debounce search
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Apply debouncing to search
const debouncedSearch = debounce((query) => {
    if (query.length > 0) {
        searchCommands(query);
    } else {
        displayCommands(commandsData);
    }
}, 300);

searchInput.addEventListener('input', (e) => {
    debouncedSearch(e.target.value.trim());
});

// Add theme toggle functionality (optional)
function toggleTheme() {
    document.body.classList.toggle('dark-theme');
    const isDark = document.body.classList.contains('dark-theme');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
}

// Load saved theme
const savedTheme = localStorage.getItem('theme');
if (savedTheme === 'dark') {
    document.body.classList.add('dark-theme');
}

// Add theme toggle button to header (optional)
const themeToggle = document.createElement('button');
themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
themeToggle.className = 'theme-toggle';
themeToggle.addEventListener('click', toggleTheme);

// You can append this to the nav-container if you want a theme toggle
// document.querySelector('.nav-container').appendChild(themeToggle);