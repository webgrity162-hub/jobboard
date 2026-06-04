<div class="px-3 py-3 sm:px-4">
    <div class="overflow-hidden rounded-[24px] border border-[#dbe5f4]">
        <div class="max-h-[420px] overflow-y-auto">
            <table class="min-w-full border-separate border-spacing-0">
                <thead class="sticky top-0 z-10 bg-[#f6f8fc]">
                    <tr class="text-left">
                        <th
                            class="rounded-tl-[20px] border-b border-[#dbe5f4] px-5 py-4 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-400">
                            Candidate</th>
                        <th
                            class="border-b border-[#dbe5f4] px-5 py-4 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-400">
                            Applied For</th>
                        <th
                            class="border-b border-[#dbe5f4] px-5 py-4 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-400">
                            Applied Date</th>
                        <th
                            class="border-b border-[#dbe5f4] px-5 py-4 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-400">
                            Status</th>
                        <th
                            class="rounded-tr-[20px] border-b border-[#dbe5f4] px-5 py-4 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-400">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($applicants as $applicant)
                        <tr class="transition hover:bg-slate-50/80">
                            <td class="border-b border-[#edf2f9] px-5 py-4 align-middle">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full text-xs font-bold text-white bg-amber-600">
                                        {{ $applicant->user['name'][0] }}
                                    </span>
                                    <div class="min-w-0">
                                        <p class="truncate text-sm font-semibold text-slate-800">
                                            {{ $applicant->user['name'] }}</p>
                                        <p class="truncate text-xs text-slate-400">{{ $applicant->user['email'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="border-b border-[#edf2f9] px-5 py-4 align-middle">
                                <div>
                                    <p class="text-sm font-semibold text-slate-800">{{ $applicant->companyJob['title'] }}
                                    </p>
                                    <span
                                        class="mt-1 inline-flex rounded-md bg-slate-100 px-2 py-1 text-[10px] font-semibold uppercase tracking-wide text-slate-500">
                                        {{ $applicant->companyJob['type'] }}
                                    </span>
                                </div>
                            </td>
                            <td class="border-b border-[#edf2f9] px-5 py-4 text-sm text-slate-500 align-middle">
                                {{  $applicant['created_at']->diffForHumans() }}</td>
                            <td class="border-b border-[#edf2f9] px-5 py-4 align-middle">
                                <span
                                    class="inline-flex rounded-full px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide {{ $applicant['status'] === 'Shortlisted' ? 'bg-fuchsia-400' : 'bg-blue-400' }}">
                                    {{ $applicant['status'] }}
                                </span>
                            </td>
                            <td class="border-b border-[#edf2f9] px-5 py-4 align-middle">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('employer.applicants.show', $applicant['id']) }}"
                                        class="rounded-xl border border-[#d6deeb] bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm transition hover:border-slate-300 hover:bg-slate-50">
                                        View Profile
                                    </a>
                                    <button type="button"
                                        class="flex h-9 w-9 items-center justify-center rounded-xl text-slate-400 transition hover:bg-slate-100 hover:text-slate-600">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div
    class="flex flex-col gap-4 border-t border-[#e8eef8] px-4 py-4 text-xs text-slate-400 sm:px-6 lg:flex-row lg:items-center lg:justify-between">
    <p>Showing 1 to {{ min($applicants->count(), 8) }} of {{ $applicants->count() }} applicants</p>

    <div class="flex flex-wrap items-center gap-2">
        <span class="inline-flex items-center gap-1.5">
            <span class="h-2 w-2 rounded-full bg-fuchsia-400"></span>
            12 Shortlisted
        </span>
        <span class="inline-flex items-center gap-1.5">
            <span class="h-2 w-2 rounded-full bg-blue-400"></span>
            4 Interviewing
        </span>
        <span class="inline-flex items-center gap-1.5">
            <span class="h-2 w-2 rounded-full bg-amber-400"></span>
            8 New
        </span>
    </div>


    <div id="pagination-links" class="flex items-center gap-2 self-start lg:self-auto">
        {{ $applicants->links() }}

    </div>
</div>