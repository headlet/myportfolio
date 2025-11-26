<div class="d-flex h-[100vh]">
  <nav class="sidebar relative overflow-visible bg-gradient-to-br from-[#1a1c2e] to-[#16181f] flex flex-col transition-all duration-500 ease-in-out text-white w-56 h-screen">

    <!-- Toggle Button -->
    <button
      class="toggle-btn absolute top-10 right-[-15px] bg-black w-[30px] h-[30px] border border-gray-300 rounded-full flex items-center justify-center shadow-xl transition-all duration-500 z-[100]"
      type="button">
      <i class="fas fa-chevron-left text-white icon transition-transform duration-500"></i>
    </button>

    <div class="flex-1 overflow-y-auto overflow-x-hidden mb-16 [scrollbar-width:none] ">
      <div class="nav flex flex-col space-y-2 p-2 pb-6">
        <a href=""
          class="flex items-center p-3 gap-2.5 {{ request()->routeIs() ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar' }}">
          <i class="fas fa-home"></i>
          <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Dashboard</span>
        </a>



        <a href="{{route('skills')}}"
          class="flex items-center p-3 gap-2.5 {{ request()->routeIs('skills') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar' }}">
          <i class="fa-solid fa-code"></i>
          <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Skill</span>
        </a>

        <a href="{{route('project')}}"
          class="flex items-center p-3 gap-2.5 {{ request()->routeIs('project') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar' }}">
          <i class="fa-solid fa-diagram-project"></i>
          <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Project</span>
        </a>

        <a href="{{route('message')}}"
          class="flex items-center p-3 gap-2.5 {{ request()->routeIs('message') ? 'border border-white bg-blue-300 text-white sidebar transition-all duration-300 ease-in-out' : 'text-gray-200 hover:bg-gray-700 sidebar' }}">
          <i class="fa-solid fa-message"></i>
          <span class="hide-on-collapse transition-all duration-500 ease-in-out origin-left">Message</span>
        </a>
      </div>
    </div>
  </nav>

</div>


<script>
  $('.toggle-btn').click(function() {
    $('.icon').toggleClass('rotate-180');
    $('.sidebar').toggleClass('w-56 w-14');
    $('.main').toggleClass('ml-56 ml-14');
    $('.hide-on-collapse').toggleClass('opacity-0 scale-0');
    $('.list').addClass('hidden').toggleClass('students');
  });
</script>