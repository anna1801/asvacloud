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

// Mobile submenu
document.addEventListener("DOMContentLoaded", function () {
  const menu = document.querySelector("#mobile-header-menu");
  menu.querySelectorAll(".menu-item-has-children > a").forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const parent = this.parentElement;
      const submenu = parent.querySelector(".sub-menu");
      // Close all sibling submenus at this level
      const siblings = Array.from(parent.parentElement.children).filter(
        (li) => li !== parent && li.classList.contains("menu-item-has-children")
      );
      siblings.forEach((sib) => {
        const sibSubmenu = sib.querySelector(".sub-menu");
        if (sib.classList.contains("open")) {
          sibSubmenu.style.maxHeight = sibSubmenu.scrollHeight + "px";
          requestAnimationFrame(() => {
            sibSubmenu.style.maxHeight = "0";
          });
          sib.classList.remove("open");
        }
      });
      // Toggle this submenu
      if (parent.classList.contains("open")) {
        // closing
        submenu.style.maxHeight = submenu.scrollHeight + "px";
        requestAnimationFrame(() => {
          submenu.style.maxHeight = "0";
        });
        parent.classList.remove("open");
      } else {
        // opening
        submenu.style.maxHeight = submenu.scrollHeight + "px";
        parent.classList.add("open");

        submenu.addEventListener(
          "transitionend",
          () => {
            submenu.style.maxHeight = "none"; // allow natural height
          },
          { once: true }
        );
      }
    });
  });
});
//End*/

// On mobile show the active resource categry first
document.addEventListener('DOMContentLoaded', function() {
  const activeItem = document.querySelector('.taxonomy-term-list li.active');
  const container = document.querySelector('.taxonomy-term-list');
  if (activeItem && container) {
      container.scrollLeft = activeItem.offsetLeft - 18;
  }
});
/*
document.addEventListener('DOMContentLoaded', function() {
  const activeItem = document.querySelector('.taxonomy-term-list li.active');
  if (activeItem) {
      // Scroll the active item into view horizontally
      activeItem.scrollIntoView({
          behavior: 'smooth', // optional, remove if you want instant
          inline: 'start',   // aligns the item to center of container
          block: 'nearest'
      });
  }
});
*/
// end