@props(['job'])

<div id="applyModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-[100] flex items-center justify-center px-4">
    <div class="bg-white rounded-lg w-full max-w-lg overflow-hidden shadow-2xl animate-in fade-in zoom-in duration-200">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h3 class="font-bold text-xl">Apply for {{ $job->title }}</h3>
            <button onclick="closeApplyModal()" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
        </div>
        <form action="{{ route('candidate.jobs.apply', $job->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Resume (PDF)</label>
                <input type="file" name="resume" accept=".pdf" required class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-linkedin-blue focus:outline-none text-sm">
                <p class="text-[10px] text-gray-500 mt-1">Please upload your latest resume in PDF format.</p>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Cover Letter (Optional)</label>
                <textarea type="text" name="cover_letter" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-linkedin-blue focus:outline-none text-sm" placeholder="Tell the employer why you're a good fit..."></textarea>
            </div>
            <div class="pt-4 flex flex-col gap-3">
                <button type="submit" class="w-full bg-linkedin-blue text-white py-2.5 rounded-full font-bold hover:bg-linkedin-darkBlue transition shadow-md">
                    Submit Application
                </button>
                <button type="button" onclick="closeApplyModal()" class="w-full text-gray-500 py-2.5 rounded-full font-bold hover:bg-gray-100 transition">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openApplyModal() {
        document.getElementById('applyModal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeApplyModal() {
        document.getElementById('applyModal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('applyModal');
        if (event.target == modal) {
            closeApplyModal();
        }
    }
</script>
