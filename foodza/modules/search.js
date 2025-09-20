(function () {
  const q   = document.getElementById('q');
  const go  = document.getElementById('go');
  const out = document.getElementById('out');

  if (!q || !go || !out) {
    console.warn('Search: required elements not found (#q, #go, #out).');
    return;
  }

  const API = '/wp-json/wp/v2/recipe';
  let timer;

  function render(items) {
    if (!Array.isArray(items) || !items.length) {
      out.innerHTML = '<p>No recipes found.</p>';
      return;
    }
    out.innerHTML = `
      <ul>
        ${items.map(p => `
          <li><a href="${p.link}">${(p.title && p.title.rendered) ? p.title.rendered : '(untitled)'}</a></li>
        `).join('')}
      </ul>`;
  }

  async function search(term) {
    const t = term.trim();
    if (!t) { out.innerHTML = ''; return; }
    out.textContent = 'Searching…';

    const url = new URL(API, window.location.origin);
    url.searchParams.set('search', t);
    url.searchParams.set('per_page', '20');
    url.searchParams.set('_fields', 'id,link,title');

    try {
      const res = await fetch(url.toString());
      if (!res.ok) throw new Error('HTTP ' + res.status);
      const data = await res.json();
      render(data);
    } catch (e) {
      out.textContent = 'Something went wrong.';
      console.error(e);
    }
  }

  go.addEventListener('click', () => search(q.value));

  q.addEventListener('input', () => {
    clearTimeout(timer);
    timer = setTimeout(() => search(q.value), 300);
  });
})();
