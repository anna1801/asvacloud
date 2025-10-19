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

/* Change background color to lst word in the heading of CTA Consultation */
document.querySelectorAll('.cta_consultation h2').forEach(el => {
  const words = el.innerHTML.trim().split(' ');
  const lastWord = words.pop();
  el.innerHTML = `${words.join(' ')} <span class="last-word">${lastWord}</span>`;
});
/* end */

/* Toggle career content */
jQuery(document).ready(function($) {
  if ($('.career-category-block').length) {
    $('.career-item.has_content').click(function(e) {
      if ($(e.target).closest('.apply-now, a, button, svg').length) return;
      var $thisItem = $(this);
      var $thisContent = $thisItem.find('.item-content');
      $('.career-item.has_content').not($thisItem).removeClass('active').find('.item-content').slideUp();
      $thisContent.slideToggle();
      $thisItem.toggleClass('active');
    });
  }
});
/* end */