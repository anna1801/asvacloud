/* mobile harmburger menu */
(function() {
  const btn = document.getElementById('harmburger-toggle');
  const nav = document.getElementById('mobile-navigation');
  const overlay = document.getElementById('menu-overlay');
  const body = document.body;

  if (!btn || !nav || !overlay) return;

  function openMenu() {
    btn.classList.add('is-open');
    btn.setAttribute('aria-expanded', 'true');
    nav.classList.add('active');
    overlay.classList.add('active');
    body.classList.add('menu-open'); // disable body scroll
  }

  function closeMenu() {
    btn.classList.remove('is-open');
    btn.setAttribute('aria-expanded', 'false');
    nav.classList.remove('active');
    overlay.classList.remove('active');
    body.classList.remove('menu-open');
  }

  // Toggle menu
  btn.addEventListener('click', function() {
    const expanded = btn.getAttribute('aria-expanded') === 'true';
    if (expanded) closeMenu(); else openMenu();
  });

  // Click outside (on overlay) closes menu
  overlay.addEventListener('click', closeMenu);

  // Press Escape closes menu
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && btn.getAttribute('aria-expanded') === 'true') {
      closeMenu();
      btn.focus();
    }
  });
})();
/* end*/