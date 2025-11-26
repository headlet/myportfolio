<!-- About -->
        <section id="about" class=" grid lg:grid-cols-3 gap-8 items-start pt-20">
            <div class="lg:col-span-2 space-y-4">
                <h2 class="text-2xl font-semibold">About Me</h2>
                <p >{{$user->description}}</p>

                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-4 rounded-lg btn-glass card-hover bgborder">
                        <div class="text-sm font-semibold">Experience</div>
                        <div class="text-xs  mt-1">{{$user->experience}}</div>
                    </div><!-- Internships and freelance web projects -->
                    <div class="p-4 rounded-lg btn-glass card-hover bgborder">
                        <div class="text-sm font-semibold">Education</div>
                        <div class="text-xs  mt-1">BSc CSIT</div>
                    </div>
                </div>

            </div>

            <aside class="p-4 rounded-lg btn-glass bgborder">
                <h4 class="text-sm font-medium">Quick Facts</h4>
                <ul class="mt-3 text-sm  space-y-2">
                    <li>📍 Based in Nepal</li>
                    <li>💼 Freelance & student projects</li>
                    <li>⚡ Focus on performance & UX</li>
                </ul>
            </aside>
        </section>
