$(document).ready(function () {
    let savedTheme = localStorage.getItem('theme');

    if (savedTheme === 'dark') {
        $('body')
            .attr('data-theme', 'dark')
            .removeClass('bg-white text-slate-800')
            .addClass('bg-slate-900 text-slate-100');
        $('.mode').attr('src', '/image/light.png');
        $('.bgborder').removeClass('backdrop-blur-sm bg-black/10');
        $('.bgblack').addClass('bg-white/60');
        $('.bgblack').removeClass('bg-black/10');


    } else {

        $('body')
            .attr('data-theme', 'light')
            .removeClass('bg-slate-900 text-slate-100')
            .addClass('bg-white text-slate-800');

        $('.mode').attr('src', '/image/night-mode.png');
        $('.bgborder').addClass('backdrop-blur-sm bg-black/10');
        $('.bgblack').removeClass('bg-white/60');
        $('.bgblack').addClass('bg-black/10');
    }
    $('#themeToggle').on('click', function () {
        let theme = $('body').attr('data-theme');

        if (theme == 'dark') {
            $('body')
                .attr('data-theme', 'light')
                .removeClass('bg-slate-900 text-slate-100')
                .addClass('bg-white text-slate-800');
            $('.mode').attr('src', '/image/night-mode.png');
            // $('.bgborder').css('background', 'linear-gradient(180deg,#eef2ff,#e0f2fe)');
            $('.bgborder').addClass('backdrop-blur-sm bg-black/10');
            $('.bgblack').removeClass('bg-white/60');
            $('.bgblack').addClass('bg-black/10');

            localStorage.setItem('theme', 'light');
        } else {
            $('body')
                .attr('data-theme', 'dark')
                .removeClass('bg-white text-slate-800')
                .addClass('bg-slate-900 text-slate-100');
            $('.mode').attr('src', '/image/light.png');
            $('.bgborder').removeClass('backdrop-blur-sm bg-black/10');

            $('.bgblack').addClass('bg-white/60');
            $('.bgblack').removeClass('bg-black/10');

            localStorage.setItem('theme', 'dark');
        }
    });


});