<!-- Scroll Progress Bar -->
<div id="scroll-progress" class="fixed top-0 left-0 h-1 bg-gradient-to-r from-primary via-accent to-secondary z-[100] transition-all duration-300" style="width: 0%"></div>

<script>
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
</script>
