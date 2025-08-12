// Termux Commands Database
const commandsData = [
    // Basic Commands
    {
        name: 'pkg',
        category: 'package',
        description: 'Package manager for Termux. Used to install, update, and manage software packages.',
        examples: [
            'pkg update',
            'pkg upgrade',
            'pkg install <package-name>',
            'pkg remove <package-name>',
            'pkg search <keyword>',
            'pkg list-installed'
        ],
        usage: 'pkg [command] [options]',
        tags: ['package', 'install', 'update', 'management']
    },
    {
        name: 'ls',
        category: 'file',
        description: 'List directory contents. Shows files and folders in the current directory.',
        examples: [
            'ls',
            'ls -la',
            'ls -lh',
            'ls -R',
            'ls *.txt'
        ],
        usage: 'ls [options] [file/directory]',
        tags: ['file', 'directory', 'list', 'view']
    },
    {
        name: 'cd',
        category: 'file',
        description: 'Change directory. Navigate to different folders in the file system.',
        examples: [
            'cd /home',
            'cd ..',
            'cd ~',
            'cd -',
            'cd /storage/emulated/0'
        ],
        usage: 'cd [directory]',
        tags: ['file', 'directory', 'navigation', 'change']
    },
    {
        name: 'pwd',
        category: 'file',
        description: 'Print working directory. Shows the current directory path.',
        examples: [
            'pwd',
            'pwd -P'
        ],
        usage: 'pwd [options]',
        tags: ['file', 'directory', 'path', 'current']
    },
    {
        name: 'cp',
        category: 'file',
        description: 'Copy files and directories. Duplicate files or folders to new locations.',
        examples: [
            'cp file.txt backup.txt',
            'cp -r folder/ newfolder/',
            'cp -v file.txt /path/to/destination/',
            'cp *.txt /backup/'
        ],
        usage: 'cp [options] source destination',
        tags: ['file', 'copy', 'duplicate', 'backup']
    },
    {
        name: 'mv',
        category: 'file',
        description: 'Move or rename files and directories. Change file locations or names.',
        examples: [
            'mv oldname.txt newname.txt',
            'mv file.txt /path/to/destination/',
            'mv -i file.txt folder/',
            'mv *.txt /archive/'
        ],
        usage: 'mv [options] source destination',
        tags: ['file', 'move', 'rename', 'relocate']
    },
    {
        name: 'rm',
        category: 'file',
        description: 'Remove files and directories. Delete files or folders permanently.',
        examples: [
            'rm file.txt',
            'rm -r folder/',
            'rm -f file.txt',
            'rm -i *.tmp',
            'rm -rf /path/to/delete/'
        ],
        usage: 'rm [options] file/directory',
        tags: ['file', 'delete', 'remove', 'clean']
    },
    {
        name: 'mkdir',
        category: 'file',
        description: 'Make directory. Create new folders in the file system.',
        examples: [
            'mkdir newfolder',
            'mkdir -p /path/to/new/folder',
            'mkdir folder1 folder2 folder3',
            'mkdir -m 755 newfolder'
        ],
        usage: 'mkdir [options] directory',
        tags: ['file', 'directory', 'create', 'folder']
    },
    {
        name: 'cat',
        category: 'file',
        description: 'Concatenate and display file contents. View file contents in terminal.',
        examples: [
            'cat file.txt',
            'cat file1.txt file2.txt > combined.txt',
            'cat > newfile.txt',
            'cat -n file.txt',
            'cat -A file.txt'
        ],
        usage: 'cat [options] [file]',
        tags: ['file', 'view', 'display', 'content']
    },
    {
        name: 'nano',
        category: 'file',
        description: 'Simple text editor. Easy-to-use command-line text editor for beginners.',
        examples: [
            'nano file.txt',
            'nano -w file.txt',
            'nano +10 file.txt',
            'nano -T 4 file.txt'
        ],
        usage: 'nano [options] [file]',
        tags: ['file', 'edit', 'text', 'editor']
    },
    {
        name: 'vim',
        category: 'file',
        description: 'Advanced text editor. Powerful command-line text editor with many features.',
        examples: [
            'vim file.txt',
            'vim +10 file.txt',
            'vim -R file.txt',
            'vim -c "set number" file.txt'
        ],
        usage: 'vim [options] [file]',
        tags: ['file', 'edit', 'text', 'editor', 'advanced']
    },
    // System Commands
    {
        name: 'top',
        category: 'system',
        description: 'Display system processes. Show real-time system resource usage and running processes.',
        examples: [
            'top',
            'top -p 1234',
            'top -u username',
            'top -n 5'
        ],
        usage: 'top [options]',
        tags: ['system', 'process', 'monitor', 'performance']
    },
    {
        name: 'ps',
        category: 'system',
        description: 'Process status. Display information about running processes.',
        examples: [
            'ps aux',
            'ps -ef',
            'ps -p 1234',
            'ps -u username',
            'ps aux | grep python'
        ],
        usage: 'ps [options]',
        tags: ['system', 'process', 'status', 'info']
    },
    {
        name: 'kill',
        category: 'system',
        description: 'Terminate processes. Stop running processes by process ID.',
        examples: [
            'kill 1234',
            'kill -9 1234',
            'kill -TERM 1234',
            'killall processname'
        ],
        usage: 'kill [options] pid',
        tags: ['system', 'process', 'terminate', 'stop']
    },
    {
        name: 'df',
        category: 'system',
        description: 'Disk free space. Show disk space usage for mounted file systems.',
        examples: [
            'df',
            'df -h',
            'df -T',
            'df /path/to/directory'
        ],
        usage: 'df [options] [file/directory]',
        tags: ['system', 'disk', 'space', 'storage']
    },
    {
        name: 'du',
        category: 'system',
        description: 'Disk usage. Show directory space usage and file sizes.',
        examples: [
            'du',
            'du -h',
            'du -sh /path/to/directory',
            'du -ah | sort -h'
        ],
        usage: 'du [options] [file/directory]',
        tags: ['system', 'disk', 'usage', 'size']
    },
    // Network Commands
    {
        name: 'ping',
        category: 'network',
        description: 'Test network connectivity. Send ICMP echo requests to test if a host is reachable.',
        examples: [
            'ping google.com',
            'ping -c 4 8.8.8.8',
            'ping -i 2 google.com',
            'ping -s 1000 google.com'
        ],
        usage: 'ping [options] host',
        tags: ['network', 'connectivity', 'test', 'reachable']
    },
    {
        name: 'curl',
        category: 'network',
        description: 'Transfer data from or to a server. Download files or make HTTP requests.',
        examples: [
            'curl https://example.com',
            'curl -O https://example.com/file.txt',
            'curl -X POST -d "data" https://api.example.com',
            'curl -H "Authorization: Bearer token" https://api.example.com'
        ],
        usage: 'curl [options] [url]',
        tags: ['network', 'download', 'http', 'api']
    },
    {
        name: 'wget',
        category: 'network',
        description: 'Retrieve files from the web. Download files from HTTP, HTTPS, and FTP servers.',
        examples: [
            'wget https://example.com/file.txt',
            'wget -c https://example.com/large-file.zip',
            'wget -r https://example.com',
            'wget --user=username --password=pass https://example.com'
        ],
        usage: 'wget [options] [url]',
        tags: ['network', 'download', 'web', 'file']
    },
    {
        name: 'ssh',
        category: 'network',
        description: 'Secure shell. Connect to remote servers securely over SSH protocol.',
        examples: [
            'ssh user@hostname',
            'ssh -p 2222 user@hostname',
            'ssh -i key.pem user@hostname',
            'ssh -X user@hostname'
        ],
        usage: 'ssh [options] user@hostname',
        tags: ['network', 'remote', 'secure', 'connect']
    },
    {
        name: 'scp',
        category: 'network',
        description: 'Secure copy. Copy files between hosts using SSH protocol.',
        examples: [
            'scp file.txt user@hostname:/path/',
            'scp -r folder/ user@hostname:/path/',
            'scp -P 2222 file.txt user@hostname:/path/',
            'scp user@hostname:/path/file.txt .'
        ],
        usage: 'scp [options] source destination',
        tags: ['network', 'copy', 'secure', 'transfer']
    },
    {
        name: 'netstat',
        category: 'network',
        description: 'Network statistics. Display network connections, routing tables, and interface statistics.',
        examples: [
            'netstat -tuln',
            'netstat -an | grep LISTEN',
            'netstat -i',
            'netstat -r'
        ],
        usage: 'netstat [options]',
        tags: ['network', 'statistics', 'connections', 'ports']
    },
    // Package Management
    {
        name: 'apt',
        category: 'package',
        description: 'Advanced Package Tool. Alternative package manager with more features than pkg.',
        examples: [
            'apt update',
            'apt upgrade',
            'apt install package-name',
            'apt remove package-name',
            'apt search keyword',
            'apt list --installed'
        ],
        usage: 'apt [command] [options]',
        tags: ['package', 'install', 'update', 'management']
    },
    {
        name: 'dpkg',
        category: 'package',
        description: 'Debian package manager. Low-level package management tool.',
        examples: [
            'dpkg -i package.deb',
            'dpkg -l | grep package',
            'dpkg -L package-name',
            'dpkg -r package-name'
        ],
        usage: 'dpkg [options] action',
        tags: ['package', 'debian', 'low-level', 'install']
    },
    // Development Commands
    {
        name: 'git',
        category: 'development',
        description: 'Version control system. Manage source code and track changes in projects.',
        examples: [
            'git init',
            'git clone https://github.com/user/repo.git',
            'git add .',
            'git commit -m "message"',
            'git push origin main',
            'git pull'
        ],
        usage: 'git [command] [options]',
        tags: ['development', 'version', 'control', 'repository']
    },
    {
        name: 'python3',
        category: 'development',
        description: 'Python 3 interpreter. Run Python scripts and start interactive Python shell.',
        examples: [
            'python3 script.py',
            'python3 -m pip install package',
            'python3 -c "print(\'Hello World\')"',
            'python3 -m http.server 8000'
        ],
        usage: 'python3 [options] [script]',
        tags: ['development', 'python', 'script', 'programming']
    },
    {
        name: 'node',
        category: 'development',
        description: 'Node.js runtime. Execute JavaScript code and run Node.js applications.',
        examples: [
            'node app.js',
            'node -e "console.log(\'Hello World\')"',
            'node --version',
            'node -p "process.version"'
        ],
        usage: 'node [options] [script]',
        tags: ['development', 'javascript', 'nodejs', 'runtime']
    },
    {
        name: 'npm',
        category: 'development',
        description: 'Node Package Manager. Install and manage JavaScript packages and dependencies.',
        examples: [
            'npm install package-name',
            'npm install -g package-name',
            'npm init',
            'npm run script',
            'npm update'
        ],
        usage: 'npm [command] [options]',
        tags: ['development', 'javascript', 'package', 'nodejs']
    },
    // Utility Commands
    {
        name: 'grep',
        category: 'utility',
        description: 'Search text patterns. Find lines matching a pattern in files or input.',
        examples: [
            'grep "pattern" file.txt',
            'grep -r "pattern" directory/',
            'grep -i "pattern" file.txt',
            'grep -n "pattern" file.txt',
            'ps aux | grep process'
        ],
        usage: 'grep [options] pattern [file]',
        tags: ['utility', 'search', 'pattern', 'text']
    },
    {
        name: 'find',
        category: 'utility',
        description: 'Find files and directories. Search for files based on various criteria.',
        examples: [
            'find . -name "*.txt"',
            'find /path -type f -mtime -7',
            'find . -size +100M',
            'find . -exec rm {} \\;',
            'find . -name "*.py" -exec python3 {} \\;'
        ],
        usage: 'find [path] [expression]',
        tags: ['utility', 'search', 'file', 'directory']
    },
    {
        name: 'tar',
        category: 'utility',
        description: 'Archive files. Create and extract compressed archives.',
        examples: [
            'tar -czf archive.tar.gz files/',
            'tar -xzf archive.tar.gz',
            'tar -tf archive.tar.gz',
            'tar -czf backup.tar.gz --exclude=*.tmp .'
        ],
        usage: 'tar [options] [archive] [files]',
        tags: ['utility', 'archive', 'compress', 'backup']
    },
    {
        name: 'zip',
        category: 'utility',
        description: 'Create ZIP archives. Compress files into ZIP format.',
        examples: [
            'zip archive.zip file1.txt file2.txt',
            'zip -r archive.zip directory/',
            'zip -P password archive.zip files/',
            'unzip archive.zip'
        ],
        usage: 'zip [options] archive files',
        tags: ['utility', 'zip', 'compress', 'archive']
    },
    {
        name: 'chmod',
        category: 'utility',
        description: 'Change file permissions. Modify read, write, and execute permissions.',
        examples: [
            'chmod 755 file.txt',
            'chmod +x script.sh',
            'chmod -R 644 directory/',
            'chmod u+rw,g+r,o-r file.txt'
        ],
        usage: 'chmod [options] mode file',
        tags: ['utility', 'permissions', 'file', 'access']
    },
    {
        name: 'chown',
        category: 'utility',
        description: 'Change file ownership. Change the owner and group of files.',
        examples: [
            'chown user:group file.txt',
            'chown -R user:group directory/',
            'chown user file.txt',
            'chown :group file.txt'
        ],
        usage: 'chown [options] owner[:group] file',
        tags: ['utility', 'ownership', 'file', 'user']
    }
];

// DOM Elements
const navToggle = document.getElementById('nav-toggle');
const navMenu = document.getElementById('nav-menu');
const commandSearch = document.getElementById('commandSearch');
const searchClear = document.getElementById('searchClear');
const filterButtons = document.querySelectorAll('.filter-btn');
const commandsGrid = document.getElementById('commandsGrid');
const backToTop = document.getElementById('backToTop');

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

// Smooth scrolling for navigation links
function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
        section.scrollIntoView({ behavior: 'smooth' });
    }
}

// Search functionality
let currentFilter = 'all';
let filteredCommands = [...commandsData];

function filterCommands() {
    const searchTerm = commandSearch.value.toLowerCase();
    const categoryFilter = currentFilter;
    
    filteredCommands = commandsData.filter(command => {
        const matchesSearch = command.name.toLowerCase().includes(searchTerm) ||
                            command.description.toLowerCase().includes(searchTerm) ||
                            command.tags.some(tag => tag.toLowerCase().includes(searchTerm)) ||
                            command.examples.some(example => example.toLowerCase().includes(searchTerm));
        
        const matchesCategory = categoryFilter === 'all' || command.category === categoryFilter;
        
        return matchesSearch && matchesCategory;
    });
    
    renderCommands();
    updateSearchClear();
}

function updateSearchClear() {
    if (commandSearch.value.length > 0) {
        searchClear.style.display = 'block';
    } else {
        searchClear.style.display = 'none';
    }
}

commandSearch.addEventListener('input', filterCommands);
commandSearch.addEventListener('keyup', (e) => {
    if (e.key === 'Escape') {
        commandSearch.value = '';
        filterCommands();
    }
});

searchClear.addEventListener('click', () => {
    commandSearch.value = '';
    filterCommands();
    commandSearch.focus();
});

// Filter buttons
filterButtons.forEach(button => {
    button.addEventListener('click', () => {
        filterButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
        currentFilter = button.dataset.category;
        filterCommands();
    });
});

// Render commands
function renderCommands() {
    commandsGrid.innerHTML = '';
    
    if (filteredCommands.length === 0) {
        commandsGrid.innerHTML = `
            <div class="no-results">
                <i class="fas fa-search"></i>
                <h3>No commands found</h3>
                <p>Try adjusting your search terms or filters</p>
            </div>
        `;
        return;
    }
    
    filteredCommands.forEach(command => {
        const commandCard = createCommandCard(command);
        commandsGrid.appendChild(commandCard);
    });
}

function createCommandCard(command) {
    const card = document.createElement('div');
    card.className = 'command-card';
    
    const categoryColors = {
        'basic': '#00d4aa',
        'file': '#6c5ce7',
        'system': '#fd79a8',
        'network': '#fdcb6e',
        'package': '#00b894',
        'development': '#e17055',
        'utility': '#74b9ff'
    };
    
    const categoryNames = {
        'basic': 'Basic',
        'file': 'File Management',
        'system': 'System',
        'network': 'Network',
        'package': 'Package Management',
        'development': 'Development',
        'utility': 'Utility'
    };
    
    card.innerHTML = `
        <div class="command-header">
            <span class="command-name">${command.name}</span>
            <span class="command-category" style="background: ${categoryColors[command.category] || '#666'}20; color: ${categoryColors[command.category] || '#666'}">
                ${categoryNames[command.category] || command.category}
            </span>
        </div>
        <p class="command-description">${command.description}</p>
        <div class="command-example">${command.examples[0]}</div>
        <div class="command-actions">
            <button class="action-btn" onclick="copyToClipboard('${command.examples[0]}')">
                <i class="fas fa-copy"></i>
                Copy
            </button>
            <button class="action-btn" onclick="showCommandDetails('${command.name}')">
                <i class="fas fa-info-circle"></i>
                Details
            </button>
        </div>
    `;
    
    return card;
}

// Copy to clipboard functionality
function copyToClipboard(text) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(() => {
            showNotification('Command copied to clipboard!', 'success');
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
        showNotification('Command copied to clipboard!', 'success');
    } catch (err) {
        showNotification('Failed to copy command', 'error');
    }
    
    document.body.removeChild(textArea);
}

// Show command details modal
function showCommandDetails(commandName) {
    const command = commandsData.find(cmd => cmd.name === commandName);
    if (!command) return;
    
    const modal = document.createElement('div');
    modal.className = 'modal';
    modal.innerHTML = `
        <div class="modal-content">
            <div class="modal-header">
                <h2>${command.name}</h2>
                <button class="modal-close" onclick="closeModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Description:</strong> ${command.description}</p>
                <p><strong>Usage:</strong> <code>${command.usage}</code></p>
                <div class="examples-section">
                    <h3>Examples:</h3>
                    <div class="examples-list">
                        ${command.examples.map(example => `
                            <div class="example-item">
                                <code>${example}</code>
                                <button class="copy-btn" onclick="copyToClipboard('${example}')">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                        `).join('')}
                    </div>
                </div>
                <div class="tags-section">
                    <h3>Tags:</h3>
                    <div class="tags-list">
                        ${command.tags.map(tag => `<span class="tag">${tag}</span>`).join('')}
                    </div>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    setTimeout(() => modal.classList.add('active'), 10);
}

function closeModal() {
    const modal = document.querySelector('.modal');
    if (modal) {
        modal.classList.remove('active');
        setTimeout(() => modal.remove(), 300);
    }
}

// Notification system
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
        <span>${message}</span>
    `;
    
    document.body.appendChild(notification);
    setTimeout(() => notification.classList.add('show'), 10);
    
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Back to top functionality
window.addEventListener('scroll', () => {
    if (window.pageYOffset > 300) {
        backToTop.classList.add('visible');
    } else {
        backToTop.classList.remove('visible');
    }
});

backToTop.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

// Active navigation highlighting
window.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');
    
    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop - 100;
        const sectionHeight = section.clientHeight;
        if (window.pageYOffset >= sectionTop && window.pageYOffset < sectionTop + sectionHeight) {
            current = section.getAttribute('id');
        }
    });
    
    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
        }
    });
});

// Keyboard shortcuts
document.addEventListener('keydown', (e) => {
    // Ctrl/Cmd + K to focus search
    if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
        e.preventDefault();
        commandSearch.focus();
    }
    
    // Escape to close modal
    if (e.key === 'Escape') {
        closeModal();
    }
});

// Touch gestures for mobile
let touchStartX = 0;
let touchEndX = 0;

document.addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
});

document.addEventListener('touchend', (e) => {
    touchEndX = e.changedTouches[0].screenX;
    handleSwipe();
});

function handleSwipe() {
    const swipeThreshold = 50;
    const diff = touchStartX - touchEndX;
    
    if (Math.abs(diff) > swipeThreshold) {
        if (diff > 0) {
            // Swipe left - could be used for next command
            console.log('Swipe left detected');
        } else {
            // Swipe right - could be used for previous command
            console.log('Swipe right detected');
        }
    }
}

// Performance optimization - debounce search
let searchTimeout;
commandSearch.addEventListener('input', () => {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(filterCommands, 300);
});

// Initialize the page
document.addEventListener('DOMContentLoaded', () => {
    renderCommands();
    updateSearchClear();
    
    // Add loading animation
    document.body.classList.add('loaded');
});

// Service Worker for PWA capabilities (optional)
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js')
            .then(registration => {
                console.log('SW registered: ', registration);
            })
            .catch(registrationError => {
                console.log('SW registration failed: ', registrationError);
            });
    });
}

// Add CSS for modal and notifications
const additionalStyles = `
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 2000;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .modal.active {
        opacity: 1;
    }
    
    .modal-content {
        background: var(--bg-tertiary);
        border-radius: var(--radius-lg);
        max-width: 600px;
        width: 90%;
        max-height: 80vh;
        overflow-y: auto;
        border: 1px solid var(--border-color);
    }
    
    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: var(--spacing-lg);
        border-bottom: 1px solid var(--border-color);
    }
    
    .modal-close {
        background: none;
        border: none;
        color: var(--text-secondary);
        font-size: 1.5rem;
        cursor: pointer;
        padding: var(--spacing-sm);
        border-radius: var(--radius-sm);
        transition: all var(--transition-fast);
    }
    
    .modal-close:hover {
        background: var(--bg-secondary);
        color: var(--text-primary);
    }
    
    .modal-body {
        padding: var(--spacing-lg);
    }
    
    .examples-section,
    .tags-section {
        margin-top: var(--spacing-lg);
    }
    
    .examples-list {
        display: flex;
        flex-direction: column;
        gap: var(--spacing-sm);
    }
    
    .example-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: var(--bg-primary);
        padding: var(--spacing-md);
        border-radius: var(--radius-md);
        border: 1px solid var(--border-color);
    }
    
    .example-item code {
        font-family: var(--font-mono);
        color: var(--text-primary);
        flex: 1;
    }
    
    .tags-list {
        display: flex;
        flex-wrap: wrap;
        gap: var(--spacing-sm);
    }
    
    .tag {
        background: var(--primary-color);
        color: white;
        padding: var(--spacing-xs) var(--spacing-sm);
        border-radius: var(--radius-sm);
        font-size: 0.75rem;
        font-weight: 500;
    }
    
    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background: var(--bg-tertiary);
        border: 1px solid var(--border-color);
        border-radius: var(--radius-md);
        padding: var(--spacing-md) var(--spacing-lg);
        display: flex;
        align-items: center;
        gap: var(--spacing-sm);
        z-index: 3000;
        transform: translateX(100%);
        transition: transform 0.3s ease;
        max-width: 300px;
    }
    
    .notification.show {
        transform: translateX(0);
    }
    
    .notification-success {
        border-left: 4px solid var(--success-color);
    }
    
    .notification-error {
        border-left: 4px solid var(--error-color);
    }
    
    .notification-info {
        border-left: 4px solid var(--primary-color);
    }
    
    .no-results {
        text-align: center;
        padding: var(--spacing-3xl);
        color: var(--text-secondary);
    }
    
    .no-results i {
        font-size: 3rem;
        margin-bottom: var(--spacing-lg);
        opacity: 0.5;
    }
    
    .no-results h3 {
        margin-bottom: var(--spacing-md);
    }
    
    @media (max-width: 768px) {
        .modal-content {
            width: 95%;
            margin: var(--spacing-md);
        }
        
        .notification {
            right: 10px;
            left: 10px;
            max-width: none;
        }
    }
`;

// Inject additional styles
const styleSheet = document.createElement('style');
styleSheet.textContent = additionalStyles;
document.head.appendChild(styleSheet);