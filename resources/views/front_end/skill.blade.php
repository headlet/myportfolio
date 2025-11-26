<!-- Skills carousel -->
<section id="skills" class="pt-20">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-semibold">Skills</h2>
        <div class="flex gap-2 items-center">
            <button id="prev" class="px-3 py-1 rounded-md btn-glass">◀</button>
            <button id="next" class="px-3 py-1 rounded-md btn-glass">▶</button>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($skill as $skills)
        <div class="p-6 rounded-lg btn-glass card-hover bgborder">
            <h3 class="font-semibold">{{$skills->skill_name}}</h3>
            <p class="text-sm mt-2">{{$skills->skill_category}}</p>
            <div class="mt-3 text-xs">{{$skills->skill_level}}</div>
        </div>
        @endforeach
    </div>
</section>