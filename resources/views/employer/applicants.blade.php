@extends('layouts.employer')
@section('title', 'Applicants')

@section('employer-content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-400">Applicants  /  View Applicants</p>
                <h1 class="mt-2 text-[2rem] font-bold tracking-tight text-slate-900">View Applicants</h1>
                <p class="mt-1 text-sm text-slate-500">Review and track all candidate progress across active roles.</p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <button type="button" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:border-slate-300 hover:bg-slate-50">
                    <i class="fa-solid fa-download text-xs"></i>
                    Export List
                </button>
                <button type="button" class="inline-flex items-center gap-2 rounded-xl bg-linkedin-blue px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-linkedin-darkBlue">
                    <i class="fa-solid fa-plus text-xs"></i>
                    Invite Candidate
                </button>
            </div>
        </div>

        <section class="rounded-[28px] border border-[#dbe5f4] bg-white shadow-[0_18px_45px_rgba(15,23,42,0.06)]">
            <div class="border-b border-[#e8eef8] px-4 py-4 sm:px-6">
                <div class="flex flex-col gap-3 xl:flex-row xl:items-center xl:justify-between">
                    
                        <div class="relative min-w-[180px]">
                            <select class="w-full appearance-none rounded-xl border border-[#d6deeb] bg-[#f9fbff] px-4 py-3 pr-10 text-sm text-slate-600 outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10" name="job" id="job">
                                <option value="">Filter by Job: All</option>
                                @foreach ($jobs as $job )

                                    <option value="{{ $job->slug }}">{{ $job->title }}</option>
                                
                                @endforeach
                            </select>
                            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400">
                                <i class="fa-solid fa-chevron-down text-[10px]"></i>
                            </span>
                        </div>
                        
                        <div class="relative min-w-[180px]">
                            <select class="w-full appearance-none rounded-xl border border-[#d6deeb] bg-[#f9fbff] px-4 py-3 pr-10 text-sm text-slate-600 outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10" name="status" id="status">
                                <option value="">Filter by Status: All</option>
                                <option value="shortlisted">Shortlisted</option>
                                <option value="review">Reviewing</option>
                                <option value="pending">Pending</option>
                            </select>
                            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400">
                                <i class="fa-solid fa-chevron-down text-[10px]"></i>
                            </span>
                        </div>
                        

                        <div class="relative min-w-[220px] flex-1 xl:min-w-[280px]">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                <i class="fa-solid fa-magnifying-glass text-xs"></i>
                            </span>
                            <input type="text" placeholder="Search candidate name..." id="search" class="w-full rounded-xl border border-[#d6deeb] bg-[#f9fbff] py-3 pl-10 pr-4 text-sm text-slate-600 outline-none transition focus:border-linkedin-blue focus:ring-4 focus:ring-linkedin-blue/10">
                        </div>
                   

                </div>
            </div>

            <div id="applicats-container">
                 @include('employer.partials.applicants-table', ['applicants' => $applicants])
            </div>
        </section>
    </div>
    <script>
   
        function fetchApplication(page =1){
        const jobSlug = document.getElementById('job').value;
        const status = document.getElementById('status').value;
        const search  = document.getElementById('search').value;
        console.log('call');
        

        fetch(`/employer/applicants?job_slug=${jobSlug}&status=${status}&search=${search}&page=${page}`,{
            headers:{
                'x-requested-with': 'XMLHttpRequest'
            }
        })
            .then(res => res.text())
            .then(html => {document.getElementById('applicats-container').innerHTML = html});
        
    }

    document.getElementById('job').addEventListener('change', fetchApplication);
    document.getElementById('status').addEventListener('change', fetchApplication);
    let timer =null;
    document.getElementById('search').addEventListener('input', function (){
        clearTimeout(timer);
        timer = setTimeout(fetchApplication, 500);
    });

    // intercept pagination clicks
document.addEventListener('click', function(e) {
    const link = e.target.closest('#pagination-links a');
    if(!link) return;
    
    e.preventDefault(); // stop full page reload
    
    // get the page number from pagination URL
    const url = new URL(link.href);
    const page = url.searchParams.get('page');
    
    // add page to current filters
    fetchApplication(page);
});


</script>
@endsection


