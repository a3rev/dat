window.addEventListener("resize", navigation_resize );

function navigation_resize() {
    if( window.innerWidth >= 1200 ){
        if( document.querySelector(".site-header-2 .site-navigation .wp-block-navigation__responsive-container") !== null ){
            document.querySelector(".site-header-2 .site-navigation .wp-block-navigation__responsive-container").classList.remove('is-menu-open');
        }
    }
}

window.addEventListener('load', function() {
    if (document.querySelectorAll('.site-navigation button.wp-block-navigation__responsive-container-open').length > 0) {
        var customMenuIcon = document.createElement('div');
        customMenuIcon.className = 'custom-menu-icon';
        for (var i = 0; i < 3; i++) {
            var customMenuIconLine = document.createElement('div');
            customMenuIconLine.className = 'custom-menu-icon-line';
            customMenuIcon.appendChild(customMenuIconLine);
        }
        document.querySelector('.site-navigation button.wp-block-navigation__responsive-container-open').appendChild(customMenuIcon);
    }
});

document.addEventListener('click', function(event) {
    if (event.target.matches('.plus, .minus')) {

        // Get values
        var quantityEl = event.target.closest('.quantity');
        var qtyEl = quantityEl.querySelector('.qty');
        var currentVal = parseFloat(qtyEl.value);
        var max = parseFloat(qtyEl.getAttribute('max'));
        var min = parseFloat(qtyEl.getAttribute('min'));
        var step = qtyEl.getAttribute('step');

        // Format values
        if (!currentVal || currentVal === '' || isNaN(currentVal)) {
          currentVal = 0;
        }
        if (max === '' || isNaN(max)) {
          max = '';
        }
        if (min === '' || isNaN(min)) {
          min = 0;
        }
        if (step === 'any' || step === '' || step === undefined || isNaN(parseFloat(step))) {
          step = 1;
        }

        // Change the value
        if (event.target.classList.contains('plus')) {

          if (max && (max == currentVal || currentVal > max)) {
            qtyEl.value = max;
          } else {
            qtyEl.value = currentVal + parseFloat(step);
          }

        } else {

          if (min && (min == currentVal || currentVal < min)) {
            qtyEl.value = min;
          } else if (currentVal > 0) {
            qtyEl.value = currentVal - parseFloat(step);
          }

        }

        // Trigger change event
        var changeEvent = new Event('change', { bubbles: true });
        qtyEl.dispatchEvent(changeEvent);
    }
});

// When the user clicks on the button, scroll to the top of the document
function datTopFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
window.addEventListener('load', function() {

    let datScrollTopButton = document.getElementById("scrollTopButton");
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        
        datScrollFunction();
    };

    function datScrollFunction() {
        if( typeof datScrollTopButton !== 'undefined' && datScrollTopButton !== null ){
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                datScrollTopButton.style.display = "flex";
            } else {
                datScrollTopButton.style.display = "none";
            }

            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.body.classList.add("sticky-header");
            } else {
                document.body.classList.remove("sticky-header");
            }
        }
    }
});

/* Collapse in mobile menus: current WordPress pins overlay submenus open
   (aria-expanded forced true, toggles inert) - in its default overlay, as in
   DAT's own header, and in custom overlays - so the theme provides collapse
   with its OWN classes: dat-sub-open, plus DAT's drawer classes open-sub /
   current-open that the default header's drawer styles key on. It never reads
   or writes core's state and only acts inside an open overlay, so desktop
   menus are untouched.
   SUNSET: when Gutenberg #82596 reaches a WordPress release (overlay toggles
   become functional), delete this listener and re-key the overlay submenu CSS
   on aria-expanded (the 1.9.3 rules, in git history). */
document.addEventListener('click', function (e) {
    var toggle = e.target.closest('.wp-block-navigation-submenu__toggle');
    if (!toggle) {
        return;
    }
    if (!toggle.closest('.wp-block-navigation__responsive-container.is-menu-open')) {
        return;
    }
    var item = toggle.closest('.wp-block-navigation-item');
    if (!item) {
        return;
    }
    var open = item.classList.toggle('dat-sub-open');
    item.classList.toggle('current-open', open);
    toggle.classList.toggle('open-sub', open);
    // Best effort only - the Interactivity API may rewrite it on its own renders.
    toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
});

/* Keyboard focus in an open mobile menu: WordPress points the menu's focus-trap
   ends at a submenu's links when it opens, and the collapse above hides those
   links again - so focus could leave the menu dialog. The theme cycles Tab /
   Shift+Tab through the controls visible at that moment instead. Same SUNSET
   as the listener above. */
document.addEventListener('keydown', function (e) {
    if (e.key !== 'Tab') {
        return;
    }
    var box = e.target.closest && e.target.closest('.wp-block-navigation__responsive-container.is-menu-open');
    if (!box) {
        return;
    }
    var items = Array.prototype.filter.call(box.querySelectorAll('a[href], button, input, select, textarea, [tabindex]:not([tabindex="-1"])'), function (el) {
        return !el.disabled && el.getClientRects().length && getComputedStyle(el).visibility !== 'hidden';
    });
    if (!items.length) {
        return;
    }
    var i = items.indexOf(e.target);
    var next = i < 0 ? items[e.shiftKey ? items.length - 1 : 0] : items[(i + (e.shiftKey ? items.length - 1 : 1)) % items.length];
    e.preventDefault();
    e.stopPropagation(); // capture phase: WordPress's own trap, keyed on hidden links, never sees it
    next.focus();
}, true);
