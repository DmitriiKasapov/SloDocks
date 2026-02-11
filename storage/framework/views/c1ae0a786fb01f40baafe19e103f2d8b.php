

<button
    id="scroll-to-top"
    type="button"
    aria-label="Вернуться наверх"
    class="fixed bottom-4 right-4 md:bottom-6 md:right-6 z-50 w-10 h-10 md:w-12 md:h-12 gradient-button-primary text-white rounded-full shadow-lg opacity-0 pointer-events-none transition-all duration-300 hover:shadow-xl hover:gradient-brand-primary focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2"
>
    <svg
        class="w-5 h-5 md:w-6 md:h-6 mx-auto"
        fill="none"
        stroke="currentColor"
        viewBox="0 0 24 24"
        aria-hidden="true"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M5 10l7-7m0 0l7 7m-7-7v18"
        />
    </svg>
</button>

<script>
    // Scroll to top button functionality
    (function() {
        const scrollButton = document.getElementById('scroll-to-top');

        if (!scrollButton) return;

        // Show button when user scrolls down 300px
        const toggleButtonVisibility = () => {
            if (window.scrollY > 300) {
                scrollButton.classList.remove('opacity-0', 'pointer-events-none');
                scrollButton.classList.add('opacity-100', 'pointer-events-auto');
            } else {
                scrollButton.classList.add('opacity-0', 'pointer-events-none');
                scrollButton.classList.remove('opacity-100', 'pointer-events-auto');
            }
        };

        // Scroll to top when button is clicked
        const scrollToTop = () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        };

        // Event listeners
        window.addEventListener('scroll', toggleButtonVisibility, { passive: true });
        scrollButton.addEventListener('click', scrollToTop);

        // Initial check
        toggleButtonVisibility();
    })();
</script>
<?php /**PATH D:\Projects\SloDoks\resources\views/components/elements/scroll-to-top.blade.php ENDPATH**/ ?>