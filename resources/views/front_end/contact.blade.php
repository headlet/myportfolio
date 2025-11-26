 <!-- Contact -->
 <section id="contact" class="mt-14 pb-20">
     <h2 class="text-2xl font-semibold">Contact</h2>
     <div class="mt-6 grid gap-6 grid-cols-1 lg:grid-cols-2 ">
         <div class="p-6 rounded-lg btn-glass bgborder">
             <h3 class="font-semibold">Let's build something</h3>
             <p class="text-smmt-2">Open for internships, freelance projects, and collaboration.
             </p>

             <div class="mt-6 space-y-3 text-sm">
                 <div>📧 <a href="mailto:{{$user->email}}" class="hover:underline">{{$user->email}}</a></div>
                 <div>📍 {{$user->location}}</div>
                 <div>🔗 <a href="{{$user->github}}" target="_blank" class="hover:underline">GitHub</a> • <a href="{{$user->linkedin}}"
                         target="_blank" class="hover:underline">LinkedIn</a></div>
             </div>

             <img src="{{asset('image/contactimg.png')}}" alt="">
         </div>

         <form id="contactForm" class="bgblack p-6 rounded-lg bg-white/60 backdrop-blur-sm text-black" method="Post" action="{{route('message')}}">
             @csrf

             <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 ">
                 <input class="p-3 rounded-md border" type="text" name='fname' placeholder="First name" required>
                 <input class="p-3 rounded-md border" type="text" name='lname' placeholder="Last name" required>
             </div>
             <input class="w-full p-3 rounded-md border mt-4" name='email' type="email" placeholder="Email" required>
             <input class="w-full p-3 rounded-md border mt-4" name='phone' type="tel" placeholder="Phone (optional)">
             <textarea class="w-full p-3 rounded-md border mt-4" rows="4" name='message' placeholder="Message" required></textarea>
             <div class="mt-4 flex items-center gap-3">
                 <button class="px-4 py-2 rounded-md" style="background:#7c3aed;color:white" type="submit">Send
                     Message</button>
                 <div id="formMsg" class="text-sm text-slate-600"></div>
             </div>
         </form>
     </div>
 </section>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 @if(session('success'))
 <script>
     Swal.fire({
         toast: true,
         position: "top-end",
         icon: "success",
         title: "{{ session('success') }}",
         showConfirmButton: false,
         timer: 2500,
         timerProgressBar: true,
         background: "#ffffff",
         color: "#1f2937",
         customClass: {
             popup: "shadow-lg rounded-lg"
         }
     });
 </script>
 @endif