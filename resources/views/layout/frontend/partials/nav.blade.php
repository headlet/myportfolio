<header class="sticky top-0 z-40 bg-transparent backdrop-blur-sm py-5 px-6 lg:px-12 ">
    <div class="max-w-6xl mx-auto flex items-center justify-between">
        <a href="{{route('index')}}" class="flex items-center gap-3">
            <div
                class="w-10 h-10 rounded-lg bg-gradient-to-br from-violet-600 to-cyan-400 flex items-center justify-center text-white font-bold">
                AJ</div>
            <div class="hidden sm:block">
                <p class="text-sm font-semibold">Ajay Bhayadyo</p>
                <p class="text-xs text-slate-500">BSc CSIT • Laravel Developer</p>
            </div>
        </a>

        <nav class="flex flex-col md:flex-row items-center gap-6 menucontent hidden md:flex transition-all duration-300 
    absolute md:static top-full left-0 w-full md:w-auto 
    bg-black/20 md:bg-transparent backdrop-blur-sm shadow-md md:shadow-none p-4 md:p-0">
    <a href="#skills" class="text-sm hover:text-violet-600  hover:bg-blue-100 px-3 py-1 rounded-2xl">Skills</a>
    <a href="#projects" class="text-sm hover:text-violet-600 hover:bg-blue-100 px-3 py-1 rounded-2xl">Projects</a>
            <a href="#about" class="text-sm hover:text-violet-600 hover:bg-blue-100 px-3 py-1 rounded-2xl">About</a>
            <a href="#contact" class="text-sm hover:text-violet-600 hover:bg-blue-100 px-3 py-1 rounded-2xl">Contact</a>
            <button id="themeToggle" class="ml-3 btn-glass rounded-full px-3 py-2 text-sm shadow-sm">
                <img src="{{asset('image/night-mode.png')}}" alt="" class="w-6 mode">
            </button>
        </nav>


        <div class="md:hidden">
            <button id="menuBtn" class="btn-glass p-2 rounded-md">Menu</button>
        </div>
    </div>
</header>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#menuBtn').click(function() {
        $('.menucontent').toggleClass('hidden');
    });
</script>