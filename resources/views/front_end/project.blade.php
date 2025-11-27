<!-- Projects -->
<section id="projects" class="pt-20">
    <div class="flex justify-between">
        <h2 class="text-2xl font-semibold">Projects</h2>
        <a href="{{route('allproject')}}" class="text-sm font-medium text-violet-600 link-underline">View More Projects
            →</a>
    </div>
    <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

        <article class="bgblack p-5 rounded-xl card-hover border bg-white/70 backdrop-blur-sm border-[rgba(2,6,23,0.03)]">
            <img src="{{asset('storage/'.$featured_proj->image)}}" alt="">
            <h4 class="font-semibold text-black">{{$featured_proj->name}}</h4>
            <p class="text-sm text-slate-600 mt-2">{{$featured_proj->description}}
            </p>
            <div class="mt-4 flex gap-3">
                <a class="text-sm px-3 py-2 rounded-md text-slate-600" href="{{$featured_proj->source}}" target="_blank">Source</a>
                <a class="text-sm px-3 py-2 rounded-md"
                    href="{{ $featured_proj->live ?? '#' }}"
                    style="background:#7c3aed;color:white"
                    @if(!$featured_proj->live) style="display:none;" @endif>
                    Live
                </a>
            </div>
        </article>

        @foreach($project as $projects)
        @if($featured_proj->id != $projects->id)
        <article class="p-5 rounded-xl btn-glass card-hover bgborder">
            <img src="{{ asset('storage/' . $projects->image) }}" alt="">
            <h4 class="font-semibold">{{ $projects->name }}</h4>
            <p class="text-sm mt-2">{{ $projects->description }}</p>

            <div class="mt-4 flex gap-3">
                <a class="text-sm px-3 py-2 rounded-md text-slate-600" href="{{$projects->source}}" target="_blank">Source</a>

                @if($projects->live)
                <a class="text-sm px-3 py-2 rounded-md" href="{{ $projects->live }}" style="background:#7c3aed;color:white" target="_blank">
                    Live
                </a>
                @endif
            </div>
        </article>
        @endif
        @endforeach


    </div>
</section>