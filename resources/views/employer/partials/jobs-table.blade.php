<div class="overflow-x-auto">
    <table class="w-full text-left">
        <thead>
            <tr
                class="border-b border-gray-100 bg-gray-200 text-[11px] font-bold uppercase tracking-widest text-gray-400">
                <th class="px-8 py-4">Job Title & ID</th>
                <th class="px-8 py-4">Location</th>
                <th class="px-8 py-4">Type</th>
                <th class="px-8 py-4">Applicants</th>
                <th class="px-8 py-4">Status</th>
                <th class="px-8 py-4 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach ($jobs as $job)
                <tr class="group transition-colors hover:bg-gray-50/50">
                    <td class="px-8 py-6">
                        <div>
                            <h3 class="text-base font-bold text-gray-900">{{ $job->title }}</h3>
                            <p class="mt-0.5 text-[11px] font-medium uppercase tracking-wider text-gray-400">
                                {{ $job->slug }}</p>
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex items-center gap-2 text-gray-600">
                            <i class="fa-solid fa-location-dot text-xs text-gray-300"></i>
                            <span class="text-sm font-medium">{{ $job->location }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-6 text-sm font-medium text-gray-600">{{ $job->type }}</td>
                    <td class="px-8 py-6">
                        <a href="{{ route('employer.applicants', ['job_slug' => $job->slug]) }}"
                            class="flex items-center gap-1.5 text-sm font-bold text-linkedin-blue hover:underline">
                            {{ $job->applicants_count ?? 0 }} Applicants <i
                                class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                        </a>
                    </td>
                    <td class="px-8 py-6">
                        @php
                            $statusColors = [
                                'active' => 'bg-emerald-50 text-emerald-700',
                                'draft' => 'bg-yellow-50 text-yellow-700',
                                'closed' => 'bg-red-50 text-red-700',
                            ];

                            $status = $job->expires_at < now() ? 'closed' : $job->status;
                            $colorClass = $statusColors[$status] ?? 'bg-gray-50 text-gray-700';
                        @endphp

                        <span
                            class="rounded-full px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider {{ $colorClass }}">
                            {{ ucfirst($status) }}
                        </span>
                    </td>
                    <td class="px-8 py-6 text-right">
                        <div class="flex justify-end gap-3">
                            <a href="{{ route('employer.jobs.edit', $job->id) }}"
                                class="text-gray-400 transition-colors hover:text-linkedin-blue">
                                <i class="fa-solid fa-pen text-sm"></i>
                            </a>
                            <button type="button"
                                onclick="openDeleteModal('{{ route('employer.jobs.delete', $job->id) }}', @js($job->title))"
                                class="text-gray-400 transition-colors hover:text-rose-500">
                                <i class="fa-solid fa-trash-can text-sm"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach

            @if (empty($jobs->items()))
                <tr>
                    <td colspan="6" class="px-8 py-6 text-center text-sm font-medium text-gray-500">
                        No jobs found.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

<div class="flex items-center justify-between border-t border-gray-100 bg-gray-50/30 px-8 py-4">
    <p class="text-xs font-medium text-gray-400">Showing 1 to {{ $jobs->count() }} of {{ $jobs->total() }}</p>
    <div id="jobs-pagination-links" class="flex items-center gap-2">
        {{ $jobs->appends(request()->except('page'))->links() }}
    </div>
</div>
</div>
