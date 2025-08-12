(function() {
  const commandsUrl = window.__COMMANDS_JSON__ || '/data/commands.json';
  const state = {
    all: [],
    filtered: [],
    category: 'all',
    query: ''
  };

  const els = {
    search: document.getElementById('searchInput'),
    chips: document.getElementById('categoryChips'),
    cards: document.getElementById('cards'),
    info: document.getElementById('resultsInfo'),
    themeToggle: document.getElementById('themeToggle')
  };

  // Theme toggle
  const THEME_KEY = 'termux-theme';
  const applyTheme = (theme) => {
    document.documentElement.dataset.theme = theme;
    localStorage.setItem(THEME_KEY, theme);
    if (theme === 'light') {
      document.documentElement.style.colorScheme = 'light';
    } else {
      document.documentElement.style.colorScheme = 'dark';
    }
  };
  const savedTheme = localStorage.getItem(THEME_KEY);
  if (savedTheme) applyTheme(savedTheme);
  if (els.themeToggle) {
    els.themeToggle.addEventListener('click', () => {
      const current = document.documentElement.dataset.theme || 'dark';
      applyTheme(current === 'dark' ? 'light' : 'dark');
    });
  }

  // Fetch commands
  fetch(commandsUrl)
    .then(r => r.json())
    .then(data => {
      state.all = normalize(data);
      state.filtered = state.all;
      render();
      bindInteractions();
    })
    .catch(err => {
      console.error('Failed to load commands:', err);
    });

  function normalize(items) {
    return (Array.isArray(items) ? items : []).map(item => ({
      name: item.name || '',
      category: item.category || 'Разное',
      summary: item.summary || '',
      description: item.description || '',
      syntax: item.syntax || (item.name || ''),
      options: Array.isArray(item.options) ? item.options : [],
      examples: Array.isArray(item.examples) ? item.examples : [],
      related: Array.isArray(item.related) ? item.related : [],
      requires: Array.isArray(item.requires) ? item.requires : [],
      tags: Array.isArray(item.tags) ? item.tags : []
    }));
  }

  function bindInteractions() {
    if (els.search) {
      const handler = debounce((e) => {
        state.query = (e.target.value || '').trim();
        updateFilter();
      }, 120);
      els.search.addEventListener('input', handler);
    }

    if (els.chips) {
      els.chips.addEventListener('click', (e) => {
        const btn = e.target.closest('[data-category]');
        if (!btn) return;
        state.category = btn.dataset.category;
        for (const chip of els.chips.querySelectorAll('.chip')) {
          chip.classList.toggle('chip-active', chip === btn);
        }
        updateFilter();
      });
    }

    if (els.cards) {
      els.cards.addEventListener('click', async (e) => {
        const copyBtn = e.target.closest('.btn-copy');
        if (copyBtn) {
          const text = copyBtn.getAttribute('data-copy') || '';
          try {
            await navigator.clipboard.writeText(text);
            copyBtn.textContent = 'Скопировано';
            setTimeout(() => copyBtn.textContent = 'Копировать синтаксис', 1100);
          } catch (_) {
            alert('Не удалось скопировать');
          }
        }
      });
    }
  }

  function updateFilter() {
    const q = state.query.toLowerCase();
    const cat = state.category;

    const matches = (cmd) => {
      if (cat !== 'all' && cmd.category !== cat) return false;
      if (!q) return true;
      const hay = [cmd.name, cmd.summary, cmd.description, cmd.syntax, ...(cmd.tags || [])].join('\n').toLowerCase();
      return hay.includes(q);
    };

    state.filtered = state.all.filter(matches);
    render();
  }

  function render() {
    if (!els.cards) return;

    els.cards.innerHTML = '';
    const frag = document.createDocumentFragment();

    state.filtered.forEach(cmd => {
      const article = document.createElement('article');
      article.className = 'card';
      article.dataset.name = cmd.name;
      article.dataset.category = cmd.category;
      article.innerHTML = `
        <div class="card-head">
          <h3 class="card-title"><a class="card-link" href="/command.php?name=${encodeURIComponent(cmd.name)}">${escapeHtml(cmd.name)}</a></h3>
          <span class="badge">${escapeHtml(cmd.category)}</span>
        </div>
        <p class="card-summary">${highlight(escapeHtml(cmd.summary), state.query)}</p>
        <div class="card-actions">
          <a class="btn btn-secondary" href="/command.php?name=${encodeURIComponent(cmd.name)}">Подробнее</a>
          <button class="btn btn-primary btn-copy" data-copy="${escapeAttr(cmd.syntax)}">Копировать синтаксис</button>
        </div>
      `;
      frag.appendChild(article);
    });

    els.cards.appendChild(frag);

    if (els.info) {
      const total = state.filtered.length;
      const all = state.all.length;
      els.info.textContent = total === all ? `Показаны все ${all} команд(ы)` : `Найдено: ${total} из ${all}`;
    }
  }

  function debounce(fn, ms) {
    let t;
    return function(...args) {
      clearTimeout(t);
      t = setTimeout(() => fn.apply(this, args), ms);
    };
  }

  function escapeHtml(str) {
    return String(str).replace(/[&<>"']/g, s => ({
      '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
    })[s]);
  }
  function escapeAttr(str) { return escapeHtml(str).replace(/\n/g, ' '); }

  function highlight(text, query) {
    const q = String(query || '').trim();
    if (!q) return text;
    try {
      const safe = q.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
      const re = new RegExp(`(${safe})`, 'gi');
      return text.replace(re, '<span class="highlight">$1</span>');
    } catch (_) {
      return text;
    }
  }
})();