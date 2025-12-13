<script>
// Mobile Menu Toggle Script
document.addEventListener('DOMContentLoaded', () => {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    const focusableSelector = 'a[href], button:not([disabled]), textarea, input, select, [tabindex]:not([tabindex="-1"])';
    let previouslyFocusedElement = null;

    function trapFocus(event) {
        if (!mobileMenu || !mobileMenu.classList.contains('active')) {
            return;
        }

        const focusableElements = mobileMenu.querySelectorAll(focusableSelector);
        if (!focusableElements.length) {
            return;
        }

        const firstElement = focusableElements[0];
        const lastElement = focusableElements[focusableElements.length - 1];

        if (event.shiftKey && document.activeElement === firstElement) {
            event.preventDefault();
            lastElement.focus();
        } else if (!event.shiftKey && document.activeElement === lastElement) {
            event.preventDefault();
            firstElement.focus();
        }
    }

    function openMobileMenu() {
        if (!mobileMenu) {
            return;
        }

        previouslyFocusedElement = document.activeElement instanceof HTMLElement ? document.activeElement : null;

        mobileMenu.classList.add('active');
        if (mobileMenuOverlay) {
            mobileMenuOverlay.classList.add('active');
        }
        mobileMenu.setAttribute('aria-hidden', 'false');
        if (mobileMenuBtn) {
            mobileMenuBtn.setAttribute('aria-expanded', 'true');
        }

        if (menuIcon) {
            menuIcon.classList.add('hidden');
        }
        if (closeIcon) {
            closeIcon.classList.remove('hidden');
        }

        const focusTarget = mobileMenu.querySelector(focusableSelector);
        if (focusTarget instanceof HTMLElement) {
            focusTarget.focus({ preventScroll: true });
        }

        document.addEventListener('keydown', handleKeyDown, true);
    }

    function closeMobileMenu() {
        if (!mobileMenu) {
            return;
        }

        mobileMenu.classList.remove('active');
        if (mobileMenuOverlay) {
            mobileMenuOverlay.classList.remove('active');
        }
        mobileMenu.setAttribute('aria-hidden', 'true');
        if (mobileMenuBtn) {
            mobileMenuBtn.setAttribute('aria-expanded', 'false');
        }

        if (menuIcon) {
            menuIcon.classList.remove('hidden');
        }
        if (closeIcon) {
            closeIcon.classList.add('hidden');
        }

        if (previouslyFocusedElement instanceof HTMLElement) {
            previouslyFocusedElement.focus({ preventScroll: true });
        }

        document.removeEventListener('keydown', handleKeyDown, true);
    }

    function handleKeyDown(event) {
        if (event.key === 'Escape') {
            closeMobileMenu();
        } else if (event.key === 'Tab') {
            trapFocus(event);
        }
    }

    if (mobileMenuBtn) {
        mobileMenuBtn.setAttribute('aria-controls', 'mobile-menu');
        mobileMenuBtn.setAttribute('aria-expanded', 'false');
        mobileMenuBtn.addEventListener('click', (event) => {
            event.preventDefault();
            if (mobileMenu?.classList.contains('active')) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });
    }

    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', (event) => {
            event.preventDefault();
            closeMobileMenu();
        });
    }

    if (mobileMenuOverlay) {
        mobileMenuOverlay.addEventListener('click', closeMobileMenu);
    }

    if (mobileMenu) {
        mobileMenu.setAttribute('aria-hidden', 'true');
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach((link) => {
            link.addEventListener('click', closeMobileMenu);
        });
    }
});

// Navbar Scroll Effect - Solid at top, semi-transparent when scrolled
(function() {
    const navbar = document.getElementById('main-navbar');
    
    if (navbar) {
        function updateNavbar() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > 50) {
                // Scrolled - Semi-transparent navbar with blur (35% white)
                navbar.classList.remove('bg-white', 'shadow-sm', 'border-border');
                navbar.classList.add('bg-white/35', 'backdrop-blur-lg', 'border-white/20', 'shadow-md');
            } else {
                // At top - Solid white navbar
                navbar.classList.add('bg-white', 'shadow-sm', 'border-border');
                navbar.classList.remove('bg-white/35', 'backdrop-blur-lg', 'border-white/20', 'shadow-md');
            }
        }
        
        // Initial check
        updateNavbar();
        
        // Update on scroll
        window.addEventListener('scroll', updateNavbar, { passive: true });
    }
})();

// Scroll reveal animation for all pages
(function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Initialize on DOM ready
    document.addEventListener('DOMContentLoaded', () => {
        // Select sections, cards, and elements to animate
        const animatedElements = document.querySelectorAll('section, .card, .logo-card, .activity-card, .event-card, .member-card, .fade-in-section, main > div > div');
        
        animatedElements.forEach((element, index) => {
            // Skip if element already has animation classes
            if (element.classList.contains('animate-fade-in-up') || element.classList.contains('animate-slide-down')) {
                return;
            }
            
            element.style.opacity = '0';
            element.style.transform = 'translateY(40px)';
            element.style.transition = `all 0.7s cubic-bezier(0.4, 0, 0.2, 1) ${Math.min(index * 0.08, 0.5)}s`;
            observer.observe(element);
        });
    });
})();

// Global image error handling - replace broken images with poltek.png
(function() {
    function handleImageError(img) {
        if (img.src !== '{{ asset("img/poltek.png") }}') {
            console.log('Image failed to load:', img.src, 'Replacing with poltek.png');
            img.src = '{{ asset("img/poltek.png") }}';
            img.alt = 'Default Image';
            img.title = 'Image not available';
            // Add some styling to indicate it's a placeholder
            img.style.opacity = '0.8';
            img.style.filter = 'grayscale(20%)';
            img.style.transition = 'all 0.3s ease';
        }
    }

    function setupImageErrorHandling() {
        // Handle existing images
        const images = document.querySelectorAll('img');
        images.forEach(function(img) {
            img.addEventListener('error', function() {
                handleImageError(this);
            });
            
            // Check if image is already broken
            if (img.complete && img.naturalHeight === 0) {
                handleImageError(img);
            }
        });

        // Handle dynamically added images
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                mutation.addedNodes.forEach(function(node) {
                    if (node.nodeType === 1) { // Element node
                        // Check if the added node is an image
                        if (node.tagName === 'IMG') {
                            node.addEventListener('error', function() {
                                handleImageError(this);
                            });
                        }
                        
                        // Check for images within the added node
                        const images = node.querySelectorAll ? node.querySelectorAll('img') : [];
                        images.forEach(function(img) {
                            img.addEventListener('error', function() {
                                handleImageError(this);
                            });
                        });
                    }
                });
            });
        });

        // Start observing
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', setupImageErrorHandling);
    } else {
        setupImageErrorHandling();
    }
})();
</script>
