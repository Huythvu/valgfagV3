// describe and create/initiate our object
const delay = 1500;
document.addEventListener('DOMContentLoaded', () => { //DomContentLoaded sørger bare for at vi henter vores elementer i DOM
const toggle = document.getElementById('search-toggle');
const wrap = document.getElementById('search-wrap');
const søgefelt = document.getElementById('sogefelt');
const out = document.getElementById('out');
let timer;
// Her laver jeg variabler der efter fanger jeg dom-elementer ved hjælp af deres class.

// Spinner
let isSpinning = false;
function showSpinner() {
    if (isSpinning) return;
    out.innerHTML = '<div class="spinner-loader" aria-label="Loading"></div>';
    isSpinning = true;
}
function hideSpinner() {
    if (!isSpinning) return;
    isSpinning = false;
}

// Toggle åben eller luk søgeboks
function openSearch() {
    wrap.hidden = false; // inden er den true eller false, så er søgefeltet synlig eller ej, her er den false dvs vis den
    søgefelt.focus();// Sørger for vi er inde i søgefeltet når man trykker på vores "søgefelt" value som er <input id="sogefelt" type="search" placeholder="Search recipes…" aria-label="Search recipes">, vi konstateret en variabel der hed søgefelt længere oppe som fanger den class
    toggle.setAttribute('aria-label', 'Close search'); 
}
function closeSearch() {
    wrap.hidden = true; // Her skjuler vi den
    toggle.setAttribute('aria-label', 'Open search');
    hideSpinner();
    clearTimeout(timer); 
}
const isOpen = () => !wrap.hidden; // Denne returnere true hvis boksen er synlig

    toggle.addEventListener('click', (e) => {
    e.preventDefault(); // 
    isOpen() ? closeSearch() : openSearch(); // Her siger vi bare hvis den er åben så luk, eller åben
});

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && isOpen()) closeSearch(); // Her laver vi en eventlistener at når man trykker på en knap, skal den gå ud af søgefeltet. escape && isopen er den open? så closeSearch luk den.
}); 


async function search(term) {
  const searchTerm = term.trim();
  if (!searchTerm) { out.innerHTML = ''; hideSpinner(); return; }

  showSpinner(); // show loader

// async
  const qs = `search=${encodeURIComponent(searchTerm)}&per_page=20&_fields=id,link,title`;
  fetch(`/wp-json/wp/v2/recipe?${qs}`)
    .then(res => res.json()) 
    .then(recipe => {
      out.innerHTML = (Array.isArray(recipe) && recipe.length)
        ? `<ul>${recipe.map(item =>
            `<li><a href="${item.link}">${item.title?.rendered ?? '(untitled)'}</a></li>`
          ).join('')}</ul>`
        : '<p>No recipes found.</p>';
    })
    .catch(() => {
      out.textContent = 'Something went wrong.';
    })

    .finally(() => {
      hideSpinner();
    });
}


// Events
søgefelt.addEventListener('input', () => {
    clearTimeout(timer);

    const val = søgefelt.value.trim();
    if (!val) {
    out.innerHTML = '';
    hideSpinner();
    return;
  }

  showSpinner(); // vis spinner imens vi venter
  timer = setTimeout(() => search(søgefelt.value), delay); // den variabel jeg lavede hel øverst går i brug nu, 1,5 sekunder delay
});

document.addEventListener('keydown', (e) => {
  const isTyping = e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA';
  if (isTyping) return;

  if (e.key.toLowerCase() === 's') {
    e.preventDefault(); // undgå at browseren fx hopper til "find" i nogle setups
    openSearch();
    søgefelt.focus();
  }
});
});
