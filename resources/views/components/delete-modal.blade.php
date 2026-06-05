@props([
    'id' => 'delete-modal',
    'title' => 'Delete item',
    'message' => 'Are you sure you want to delete this item? This action cannot be undone.',
    'confirmText' => 'Delete',
])

<div id="{{ $id }}" data-delete-modal="{{ $id }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-slate-900/50 px-4">
    <div class="w-full max-w-md rounded-2xl bg-white shadow-xl">
        <div class="border-b border-slate-100 px-6 py-5">
            <h2 class="text-lg font-bold text-slate-900">{{ $title }}</h2>
            <p id="{{ $id }}-message" class="mt-1 text-sm leading-6 text-slate-500">{{ $message }}</p>
        </div>

        <form id="{{ $id }}-form" method="POST" class="px-6 py-5">
            @csrf
            @method('DELETE')

            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <button type="button"
                    class="rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
                    data-delete-modal-close="{{ $id }}">
                    Cancel
                </button>
                <button type="submit"
                    class="rounded-xl bg-rose-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-rose-700">
                    {{ $confirmText }}
                </button>
            </div>
        </form>
    </div>
</div>

@once
    <script>
        function openDeleteModal(action, itemName = '', modalId = 'delete-modal') {
            const modal = document.getElementById(modalId);
            const form = document.getElementById(`${modalId}-form`);
            const message = document.getElementById(`${modalId}-message`);

            if (!modal || !form) return;

            form.action = action;

            if (message && itemName) {
                message.textContent = `Are you sure you want to delete "${itemName}"? This action cannot be undone.`;
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDeleteModal(modalId = 'delete-modal') {
            const modal = document.getElementById(modalId);
            if (!modal) return;

            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        document.addEventListener('click', function(e) {
            const closeButton = e.target.closest('[data-delete-modal-close]');
            if (closeButton) {
                closeDeleteModal(closeButton.dataset.deleteModalClose);
                return;
            }

            if (e.target.dataset.deleteModal) {
                closeDeleteModal(e.target.dataset.deleteModal);
            }
        });
    </script>
@endonce
