(function () {
  var btn = document.getElementById('menuBtn');
  var nav = document.getElementById('nav');
  if (!btn || !nav) return;
  var desktop = window.matchMedia('(min-width: 861px)');

  function setOpen(open, returnFocus) {
    nav.classList.toggle('open', open);
    btn.setAttribute('aria-expanded', open);
    btn.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    if (!open && returnFocus) btn.focus();
  }

  btn.addEventListener('click', function () {
    setOpen(!nav.classList.contains('open'));
  });

  nav.addEventListener('click', function (e) {
    if (e.target.closest('a')) setOpen(false);
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && nav.classList.contains('open')) setOpen(false, true);
  });

  desktop.addEventListener('change', function (e) {
    if (e.matches) setOpen(false);
  });
})();

/* back-to-top */
(function () {
  var top = document.getElementById('toTop');
  if (!top) return;
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)');
  function toggle() { top.classList.toggle('show', window.scrollY > 600); }
  window.addEventListener('scroll', toggle, { passive: true });
  top.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: reduce.matches ? 'auto' : 'smooth' });
  });
  toggle();
})();

/* scroll-reveal */
(function () {
  var items = document.querySelectorAll('main > section:not(.hero), .cat, .why-item, .brand-card');
  if (!('IntersectionObserver' in window)) return;
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting || e.boundingClientRect.top < 0) { e.target.classList.add('in'); io.unobserve(e.target); }
    });
  }, { threshold: 0.12 });
  items.forEach(function (el) { el.classList.add('reveal'); io.observe(el); });
})();

/* brand logo marquee: duplicate the track so the loop is seamless */
(function () {
  var box = document.querySelector('.marquee');
  var track = box && box.querySelector('.marquee-track');
  if (!track) return;
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)');
  if (reduce.matches) { track.classList.add('marquee-static'); return; }
  Array.prototype.slice.call(track.children).forEach(function (li) {
    var clone = li.cloneNode(true);
    clone.setAttribute('aria-hidden', 'true');
    clone.querySelector('img').alt = '';
    track.appendChild(clone);
  });
  box.classList.add('is-scrolling');
})();

/* products page: search + category filter */
(function () {
  var root = document.querySelector('[data-discover]');
  if (!root) return;

  var input = root.querySelector('[data-discover-q]');
  var chips = root.querySelectorAll('[data-cat]');
  var status = root.querySelector('[data-discover-status]');
  var items = document.querySelectorAll('[data-item]');
  var grids = document.querySelectorAll('[data-discover-grid]');
  var form = root.querySelector('[data-discover-form]');
  var activeCat = 'all';

  function apply() {
    var q = input.value.trim().toLowerCase();
    var shown = 0;

    items.forEach(function (item) {
      var cats = item.getAttribute('data-cats').split(' ');
      var matchesCat = activeCat === 'all' || cats.indexOf(activeCat) !== -1;
      var matchesText = q === '' || item.getAttribute('data-text').indexOf(q) !== -1;
      var visible = matchesCat && matchesText;
      item.hidden = !visible;
      if (visible) { shown++; }
    });

    grids.forEach(function (grid) {
      var empty = grid.parentNode.querySelector('[data-empty]');
      var any = grid.querySelectorAll('[data-item]:not([hidden])').length > 0;
      if (empty) { empty.hidden = any; }
    });

    var filtering = q !== '' || activeCat !== 'all';
    status.textContent = filtering
      ? shown + (shown === 1 ? ' result' : ' results') + ' across categories, applications and industries'
      : '';
  }

  chips.forEach(function (chip) {
    chip.addEventListener('click', function () {
      activeCat = chip.getAttribute('data-cat');
      chips.forEach(function (c) { c.setAttribute('aria-pressed', c === chip ? 'true' : 'false'); });
      apply();
    });
  });

  input.addEventListener('input', apply);
  form.addEventListener('submit', function (e) { e.preventDefault(); });
})();
