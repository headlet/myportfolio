@extends('layout.frontend.master')

@section('contents')
<!-- Projects -->
<section id="projects" class="pt-20 h-full">
    <h2 class="text-2xl font-semibold">Projects</h2>
    <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

        @foreach($project as $projects)
        <article class="p-5 rounded-xl btn-glass card-hover bgborder">
            <img src="{{ asset('storage/' . $projects->image) }}" alt="">
            <h4 class="font-semibold">{{ $projects->name }}</h4>
            <p class="text-sm mt-2">{{ $projects->description }}</p>

            <div class="mt-4 flex gap-3">
                <a class="text-sm px-3 py-2 rounded-md text-slate-600" href="{{$projects->source}}">Source</a>
                <a class="text-sm px-3 py-2 rounded-md"
                    href="{{ $projects->live ?? '#' }}"
                    style="background:#7c3aed;color:white"
                    @if(!$projects->live) style="display:none;" @endif>
                    Live
                </a>
            </div>
        </article>
        @endforeach

    </div>
</section>
@endsection