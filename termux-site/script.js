const state = {
  allCommands: [],
  filteredCommands: [],
  activeCategory: "All",
  searchQuery: "",
  deferredPrompt: null,
};

const dom = {
  searchInput: document.getElementById("searchInput"),
  clearSearch: document.getElementById("clearSearch"),
  categoryChips: document.getElementById("categoryChips"),
  commandsGrid: document.getElementById("commandsGrid"),
  resultCount: document.getElementById("resultCount"),
  installBtn: document.getElementById("installBtn"),
  themeToggle: document.getElementById("themeToggle"),
};

function setViewportUnitFix() {
  const setVh = () => {
    const vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty("--vh", `${vh}px`);
  };
  setVh();
  window.addEventListener("resize", setVh);
}

function normalize(text) {
  return (text || "").toLowerCase().normalize("NFKD");
}

async function loadCommands() {
  try {
    const res = await fetch("commands.json", { cache: "no-store" });
    if (!res.ok) throw new Error("Failed to load commands");
    const data = await res.json();
    state.allCommands = data.commands;
    state.filteredCommands = state.allCommands;
    buildCategoryChips();
    render();
  } catch (err) {
    console.error(err);
    state.allCommands = [];
    render();
  }
}

function getCategories() {
  const categories = new Set(["All"]);
  for (const cmd of state.allCommands) {
    if (Array.isArray(cmd.categories)) {
      cmd.categories.forEach((c) => categories.add(c));
    } else if (cmd.category) {
      categories.add(cmd.category);
    }
  }
  return Array.from(categories);
}

function buildCategoryChips() {
  const categories = getCategories();
  dom.categoryChips.innerHTML = "";
  categories.forEach((category) => {
    const chip = document.createElement("button");
    chip.className = `chip ${category === state.activeCategory ? "active" : ""}`;
    chip.textContent = category;
    chip.addEventListener("click", () => {
      state.activeCategory = category;
      filterAndRender();
      updateChipsActiveState();
    });
    dom.categoryChips.appendChild(chip);
  });
}

function updateChipsActiveState() {
  const chips = dom.categoryChips.querySelectorAll(".chip");
  chips.forEach((chip) => {
    chip.classList.toggle("active", chip.textContent === state.activeCategory);
  });
}

function filterAndRender() {
  const query = normalize(state.searchQuery);
  state.filteredCommands = state.allCommands.filter((cmd) => {
    const categoryMatch =
      state.activeCategory === "All" || (cmd.categories || [cmd.category]).includes(state.activeCategory);

    if (!categoryMatch) return false;

    if (!query) return true;

    const haystack = [
      cmd.name,
      cmd.syntax,
      cmd.description,
      ...(cmd.examples || []).map((e) => `${e.title} ${e.command}`),
      ...(cmd.tags || []),
    ]
      .filter(Boolean)
      .map(normalize)
      .join(" ");

    return haystack.includes(query);
  });
  render();
}

function render() {
  dom.commandsGrid.innerHTML = "";

  if (!state.filteredCommands.length) {
    dom.resultCount.textContent = "No commands found";
    return;
  }

  dom.resultCount.textContent = `${state.filteredCommands.length} result${
    state.filteredCommands.length === 1 ? "" : "s"
  }`;

  const fragment = document.createDocumentFragment();

  for (const command of state.filteredCommands) {
    const card = document.createElement("article");
    card.className = "card";

    const header = document.createElement("div");
    header.className = "card-header";

    const title = document.createElement("h3");
    title.className = "command-name";
    title.textContent = command.name;

    const pill = document.createElement("span");
    pill.className = "category-pill";
    pill.textContent = (command.categories && command.categories[0]) || command.category || "General";

    header.appendChild(title);
    header.appendChild(pill);

    const body = document.createElement("div");
    body.className = "card-body";

    const desc = document.createElement("p");
    desc.className = "description";
    desc.textContent = command.description || "";

    const code = document.createElement("pre");
    code.className = "code";

    const codeBtn = document.createElement("button");
    codeBtn.className = "copy-btn";
    codeBtn.textContent = "Copy";
    codeBtn.addEventListener("click", async () => {
      try {
        await navigator.clipboard.writeText(command.syntax);
        codeBtn.textContent = "Copied";
        codeBtn.classList.add("success");
        setTimeout(() => {
          codeBtn.textContent = "Copy";
          codeBtn.classList.remove("success");
        }, 1200);
      } catch (e) {}
    });

    const codeText = document.createElement("code");
    codeText.textContent = command.syntax;

    code.appendChild(codeBtn);
    code.appendChild(codeText);

    body.appendChild(desc);
    body.appendChild(code);

    if (command.examples && command.examples.length) {
      const examplesWrap = document.createElement("div");
      examplesWrap.className = "examples";
      const exTitle = document.createElement("h4");
      exTitle.textContent = "Examples";
      const list = document.createElement("ul");
      for (const ex of command.examples) {
        const li = document.createElement("li");
        li.innerHTML = `<strong>${ex.title}:</strong> <code>${ex.command}</code>`;
        list.appendChild(li);
      }
      examplesWrap.appendChild(exTitle);
      examplesWrap.appendChild(list);
      body.appendChild(examplesWrap);
    }

    card.appendChild(header);
    card.appendChild(body);

    fragment.appendChild(card);
  }

  dom.commandsGrid.appendChild(fragment);
}

function wireSearch() {
  dom.searchInput.addEventListener("input", (e) => {
    state.searchQuery = e.target.value;
    filterAndRender();
  });
  dom.clearSearch.addEventListener("click", () => {
    state.searchQuery = "";
    dom.searchInput.value = "";
    filterAndRender();
    dom.searchInput.focus();
  });
}

function initTheme() {
  const KEY = "termux-theme";
  const prefersDark = window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches;
  const saved = localStorage.getItem(KEY);
  if (saved) {
    document.documentElement.dataset.theme = saved;
  } else {
    document.documentElement.dataset.theme = prefersDark ? "dark" : "light";
  }
  const updateBtnIcon = () => {
    dom.themeToggle.querySelector(".icon").textContent =
      document.documentElement.dataset.theme === "dark" ? "🌙" : "☀️";
  };
  updateBtnIcon();
  dom.themeToggle.addEventListener("click", () => {
    const next = document.documentElement.dataset.theme === "dark" ? "light" : "dark";
    document.documentElement.dataset.theme = next;
    localStorage.setItem(KEY, next);
    updateBtnIcon();
  });
}

function initPWA() {
  if ("serviceWorker" in navigator) {
    navigator.serviceWorker.register("sw.js").catch(() => {});
  }
  window.addEventListener("beforeinstallprompt", (e) => {
    e.preventDefault();
    state.deferredPrompt = e;
    dom.installBtn.hidden = false;
  });
  dom.installBtn.addEventListener("click", async () => {
    if (!state.deferredPrompt) return;
    state.deferredPrompt.prompt();
    const { outcome } = await state.deferredPrompt.userChoice;
    if (outcome) {
      dom.installBtn.hidden = true;
      state.deferredPrompt = null;
    }
  });
}

function hydrateFromQuery() {
  const params = new URLSearchParams(location.search);
  const q = params.get("q");
  const c = params.get("c");
  if (q) {
    state.searchQuery = q;
    dom.searchInput.value = q;
  }
  if (c) {
    state.activeCategory = c;
  }
}

function pushUrlState() {
  const params = new URLSearchParams();
  if (state.searchQuery) params.set("q", state.searchQuery);
  if (state.activeCategory && state.activeCategory !== "All") params.set("c", state.activeCategory);
  const next = `${location.pathname}?${params.toString()}`;
  history.replaceState(null, "", next);
}

function observeStateChanges() {
  const reroute = () => pushUrlState();
  ["input", "click"].forEach((evt) => {
    document.addEventListener(evt, reroute, true);
  });
}

async function main() {
  setViewportUnitFix();
  initTheme();
  initPWA();
  hydrateFromQuery();
  wireSearch();
  await loadCommands();
  observeStateChanges();
}

main();