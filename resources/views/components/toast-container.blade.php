<div id="toast-container" class="fixed top-5 right-5 z-[9999] flex flex-col gap-3">
    @if(session('success') )
        <x-toast type="success" :message="session('success')  " />
    @endif

    @if(session('error'))
        <x-toast type="error" :message="session('error')" />
    @endif

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toasts = document.querySelectorAll('.toast-notification');
        toasts.forEach(toast => {
            showToast(toast);
        });
    });

    function showToast(toast) {
        // Initial state is hidden via CSS classes
        setTimeout(() => {
            toast.classList.remove('translate-x-full', 'opacity-0');
            toast.classList.add('translate-x-0', 'opacity-100');
        }, 100);

        // Auto remove after 5 seconds
        const duration = 5000;
        const timer = setTimeout(() => {
            closeToast(toast);
        }, duration);

        // Store timer in element to clear if closed manually
        toast.dataset.timer = timer;
    }

    function closeToast(button) {
        const toast = button.closest ? button.closest('.toast-notification') : button;
        if (!toast) return;

        if (toast.dataset.timer) {
            clearTimeout(toast.dataset.timer);
        }

        toast.classList.remove('translate-x-0', 'opacity-100');
        toast.classList.add('translate-x-full', 'opacity-0');

        // Remove from DOM after transition
        setTimeout(() => {
            toast.remove();
        }, 300);
    }
</script>
