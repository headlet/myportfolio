<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('title')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <style>
        body {
            overflow-x: hidden;
        }

        .cursor {
            position: fixed;
            top: 0;
            left: 0;
            pointer-events: none;
            background: radial-gradient(circle, #ff00ff, #00ffff);
            transform: translate(-50%, -50%);
            transition: transform 0.1s ease-out;
            box-shadow: 0 0 20px #ff00ff, 0 0 40px #00ffff, 0 0 60px #ff00ff;
            z-index: 9999;
        }

        #cursorCanvas {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }
    </style>
</head>

<body class="bg-slate-900 text-slate-100" data-theme="dark">

    <!-- Glow Cursor -->
    <div class="cursor"></div>

    <!-- Page Content -->
    @include('layout.frontend.partials.nav')
    <main class="max-w-6xl mx-auto px-6 lg:px-12 ">
        @yield('contents')
    
    @include('layout.frontend.partials.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/index.js') }}"></script>

    <!-- Particle Canvas -->
    <canvas id="cursorCanvas"></canvas>

    <script>
        // SMOOTH GLOW CURSOR
        const cursor = document.querySelector('.cursor');
        let mouse = { x: 0, y: 0 };
        let pos = { x: 0, y: 0 };

        document.addEventListener('mousemove', e => {
            mouse.x = e.clientX;
            mouse.y = e.clientY;
        });

        function animateCursor() {
            pos.x += (mouse.x - pos.x) * 0.2;
            pos.y += (mouse.y - pos.y) * 0.2;
            cursor.style.transform = `translate(${pos.x}px, ${pos.y}px)`;
            requestAnimationFrame(animateCursor);
        }

        animateCursor();

        // PARTICLES
        const canvas = document.getElementById('cursorCanvas');
        const ctx = canvas.getContext('2d');

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        let particles = [];

        class Particle {
            constructor(x, y) {
                this.x = x;
                this.y = y;
                this.size = Math.random() * 5 + 2;
                this.color = `hsl(${Math.random() * 360}, 100%, 50%)`;
                this.speedX = (Math.random() - 0.5) * 2;
                this.speedY = (Math.random() - 0.5) * 2;
            }

            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                this.size *= 0.95;
            }

            draw() {
                ctx.fillStyle = this.color;
                ctx.shadowColor = this.color;
                ctx.shadowBlur = 15;
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        // Particles on mouse move
        window.addEventListener('mousemove', e => {
            for (let i = 0; i < 5; i++) {
                particles.push(new Particle(e.clientX, e.clientY));
            }
        });

        // Extra particles on click
        window.addEventListener('click', e => {
            for (let i = 0; i < 20; i++) { // burst particles
                particles.push(new Particle(e.clientX, e.clientY));
            }
        });

        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height); // no overlay

            particles.forEach((p, index) => {
                p.update();
                p.draw();
                if (p.size < 0.5) particles.splice(index, 1);
            });

            requestAnimationFrame(animateParticles);
        }

        animateParticles();
    </script>

</body>

</html>
