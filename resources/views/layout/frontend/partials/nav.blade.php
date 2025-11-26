<header class="sticky top-0 z-40 bg-transparent backdrop-blur-sm py-5 px-6 lg:px-12 ">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
            <a href="#" class="flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded-lg bg-gradient-to-br from-violet-600 to-cyan-400 flex items-center justify-center text-white font-bold">
                    AJ</div>
                <div class="hidden sm:block">
                    <p class="text-sm font-semibold">Ajay Bhayadyo</p>
                    <p class="text-xs text-slate-500">BSc CSIT • Laravel Developer</p>
                </div>
            </a>

            <nav class="hidden md:flex items-center gap-6">
                <a href="#skills" class="text-sm hover:text-violet-600">Skills</a>
                <a href="#projects" class="text-sm hover:text-violet-600">Projects</a>
                <a href="#about" class="text-sm hover:text-violet-600">About</a>
                <a href="#contact" class="text-sm hover:text-violet-600">Contact</a>
                <button id="themeToggle" class="ml-3 btn-glass rounded-full px-3 py-2 text-sm shadow-sm"><img
                        src="{{asset('image/night-mode.png')}}" alt="" class="w-6 mode">
                </button>
            </nav>

            <div class="md:hidden">
                <button id="menuBtn" class="btn-glass p-2 rounded-md">Menu</button>
            </div>
        </div>
    </header>