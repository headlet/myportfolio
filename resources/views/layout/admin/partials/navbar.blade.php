<nav class="bg-gray-900 text-white px-6 py-3 flex items-center justify-between shadow-lg h-16 w-full">
  <!-- Left Logo -->

  <div class="flex items-center ">
    <div class="w-52">
      <span class="text-2xl font-bold bg-gradient-to-r from-blue-500 to-blue-300 bg-clip-text text-transparent ">
        Admin Panel
      </span>
    </div>

  </div>

  <!-- Right Profile -->

  <div class="relative text-black">
    <div class="flex items-center space-x-3 cursor-pointer" id="profileDropdownButton">
      <span class="text-white">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>

      <img src="{{asset('storage/'. Auth::user()->profile_picture)}}" alt="profile"
        class="w-10 h-10 rounded-full border-2 border-gray-500">
    </div>

    <!-- S -->
    <div id="profileDropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg hidden">
      <a href="{{route('profile')}}" class="block px-4 py-2 text-black hover:bg-gray-100">Account Settings</a>
      <form action="{{route('logout')}}" method="POST">
        @csrf
        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
      </form>
    </div>
  </div>

</nav>



<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
  $('.searchbtn').click(function() {
    const searchBox = $("#searchBox");

    if (searchBox.hasClass("hidden")) {
      searchBox.removeClass("hidden");
      searchBox.focus();
    } else {
      const query = searchBox.val().trim();
      if (query !== "") {
        searchBox.closest('form').submit();
        console.log("Searching for:", query);

        //use ajax
      } else {
        searchBox.addClass('hidden');
      }
    }
  });

  $('#profileDropdownButton').click(function() {
    $('#profileDropdownMenu').toggle('hidden');
  });
</script>