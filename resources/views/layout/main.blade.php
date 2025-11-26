<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  @yield('title')
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="main-div">
        @yield('body')
        @yield('footer')
    </div>

  <!-- <script src="{{ asset('/js/validateFormJquery.js') }" type="module"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  @yield('script')
</body>

</html>