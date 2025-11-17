<style>
/* Shared Global Styles */

/* Mobile Menu Overlay */
.mobile-menu-overlay {
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
}
.mobile-menu-overlay.active {
    opacity: 1;
    visibility: visible;
}

/* Mobile Menu */
.mobile-menu {
    transform: translateX(100%);
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}
.mobile-menu.active {
    transform: translateX(0);
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
