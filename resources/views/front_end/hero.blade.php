<section class="mt-8 grid gap-8 hero-grid items-center" style="display:grid;grid-template-columns:1fr">
    <div class="space-y-6 flex items-center flex-col gap-x-4 md:flex-row md:justify-between">
        <div class="space-y-6 flex flex-col justify-center">
            <p class="text-sm ">Hello, I'm</p>
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">{{$user->first_name}} <span
                    class="gradient-text">{{$user->last_name}}</span></h1>
            <p class="text-lg max-w-2xl">{{$user->introduction}}</p>

            <div class="flex gap-4 items-center">
                <a href="#contact"
                    class="inline-flex items-center gap-3 rounded-lg px-5 py-3 btn-glass card-hover bgborder">
                    <span class="text-sm font-medium">Contact Me</span>
                </a>

                <a href="#projects" class="text-sm font-medium text-violet-600 link-underline">See Projects
                    →</a>
            </div>

            <div class="mt-3 text-sm text-slate-500 ">Find me on
                <a href="{{$user->github}}" class="ml-2 hover:underline ">GitHub</a>
                <a href=""><i class="fa-brands fa-linkedin"></i></a>
            </div>

            <div class="mt-6 flex gap-3">
                <div class="text-xs text-slate-500">Role</div>
                <div class="px-3 py-1 text-sm rounded-full btn-glass bgborder">Frontend & Backend</div>
                <div class="px-3 py-1 text-sm rounded-full btn-glass bgborder">Laravel / PHP</div>
            </div>
        </div>

        <img src="{{asset('storage/'. $user->profile_picture)}}" alt="mypic"
            class=" border-4 rounded-full p-4 w-96 h-96 bg-gradient-to-br from-violet-600 to-cyan-400 mypic">

    </div>

    <div class="relative pt-20">
        <div class="w-full rounded-2xl overflow-hidden shadow-2xl"
            style="background: linear-gradient(180deg,#eef2ff, #e0f2fe);">
            <div class="p-6 lg:p-10 flex flex-col lg:flex-row gap-6 items-center">
                <div class="w-full lg:w-1/2">
                    <div class="w-80 h-40 rounded-xl mx-auto lg:mx-0 project">
                        <img src="{{asset('storage/'.$featured_proj->image)}}" alt="" class="rounded-xl">
                    </div>
                </div>
                <div class="w-full lg:w-1/2 text-center lg:text-left">
                    <div class="text-sm text-slate-500">Featured Project</div>
                    <h3 class="text-xl font-semibold text-black">{{$featured_proj->name}}</h3>
                    <p class="text-sm text-slate-600 mt-2">{{$featured_proj->description}}</p>
                    <div class="mt-4 flex justify-center lg:justify-start gap-3">
                        <a class="px-3 py-2 rounded-md text-sm btn-glass text-slate-500" href="#projects">View details</a>
                        <a class="px-3 py-2 rounded-md text-sm" href="{{$featured_proj->source}}"
                            style="background:#7c3aed;color:white" target="_blank">Source</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>