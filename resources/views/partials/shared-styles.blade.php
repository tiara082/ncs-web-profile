<style>
/* Shared Global Styles */

/* Mobile Menu Overlay */
.mobile-menu-overlay {
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
}
.mobile-menu-overlay.active {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
}

/* Mobile Menu */
.mobile-menu {
    transform: translateX(100%);
    pointer-events: none;
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}
.mobile-menu.active {
    transform: translateX(0);
    pointer-events: auto;
}

/* Hover Effects */
.hover-lift {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hover-lift:hover {
    transform: translateY(-4px);
}

/* Smooth Scroll */
.scroll-smooth {
    scroll-behavior: smooth;
}
</style>
