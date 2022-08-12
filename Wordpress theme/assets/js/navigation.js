/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
    var navContain, btnClose, button, menu, links, i, len;

    navContain = document.getElementById('site-navigation');
    if (!navContain) {
        return;
    }

    btnClose = document.getElementsByClassName('akblog-menu-close')[0];
    button = document.getElementsByClassName('menu-toggle')[0];
    if ('undefined' === typeof button) {
        return;
    }

    menu = navContain.getElementsByTagName('ul')[0];

    // Hide menu toggle button if menu is empty and return early.
    if ('undefined' === typeof menu) {
        button.style.display = 'none';
        return;
    }

    if (-1 === menu.className.indexOf('nav-menu')) {
        menu.className += ' nav-menu';
    }

    button.onclick = function () {

        if (navContain.classList.contains('hidden-mobile') == true) {
            navContain.className = navContain.className.replace('hidden-mobile', '');

            button.setAttribute('aria-expanded', 'false');
        } else {
            navContain.className += ' hidden-mobile';
            button.setAttribute('aria-expanded', 'true');

        }
    };

    btnClose.onclick = function () {
        navContain.classList.add('hidden-mobile');
    };

    // Close small menu when user clicks outside
    document.addEventListener('click', function (event) {
        var isClickInside = navContain.contains(event.target);

        if (!isClickInside) {
            navContain.className = navContain.className.replace(' toggled', '');
            button.setAttribute('aria-expanded', 'false');
        }
    });

    // Get all the link elements within the menu.
    links = menu.getElementsByTagName('a');

    // Each time a menu link is focused or blurred, toggle focus.
    for (i = 0, len = links.length; i < len; i++) {
        links[i].addEventListener('focus', toggleFocus, true);
        links[i].addEventListener('blur', toggleFocus, true);
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while (-1 === self.className.indexOf('nav-menu')) {
            // On li elements toggle the class .focus.
            if ('li' === self.tagName.toLowerCase()) {
                if (-1 !== self.className.indexOf('focus')) {
                    self.className = self.className.replace(' focus', '');
                } else {
                    self.className += ' focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    (function () {
        var touchStartFn,
            parentLink = navContain.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

        if ('ontouchstart' in window) {
            touchStartFn = function (e) {
                var menuItem = this.parentNode;

                if (!menuItem.classList.contains('focus')) {
                    e.preventDefault();
                    for (i = 0; i < menuItem.parentNode.children.length; ++i) {
                        if (menuItem === menuItem.parentNode.children[i]) {
                            continue;
                        }
                        menuItem.parentNode.children[i].classList.remove('focus');
                    }
                    menuItem.classList.add('focus');
                } else {
                    menuItem.classList.remove('focus');
                }
            };

            for (i = 0; i < parentLink.length; ++i) {
                parentLink[i].addEventListener('touchstart', touchStartFn, false);
            }
        }
    }(navContain));

}());

/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
(function () {
    var isIe = /(trident|msie)/i.test(navigator.userAgent);

    if (isIe && document.getElementById && window.addEventListener) {
        window.addEventListener('hashchange', function () {
            var id = location.hash.substring(1),
                element;

            if (!(/^[A-z0-9_-]+$/.test(id))) {
                return;
            }

            element = document.getElementById(id);

            if (element) {
                if (!(/^(?:a|select|input|button|textarea)$/i.test(element.tagName))) {
                    element.tabIndex = -1;
                }

                element.focus();
            }
        }, false);
    }
}());
