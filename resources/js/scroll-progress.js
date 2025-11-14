// Scroll Progress Bar Script
(function() {
    window.addEventListener('scroll', () => {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        const progress = document.getElementById('scroll-progress');
        if (progress) progress.style.width = scrolled + '%';
    });
})();
