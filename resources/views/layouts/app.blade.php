<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VolunteerHub | Make a Difference</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-50 text-gray-800 scroll-smooth">

<!-- ================= NAVBAR ================= -->
<header id="navbar"
class="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-xl border-b border-gray-200 transition-all duration-300">

    <nav class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

        <!-- Logo -->
        <a href="/" class="flex items-center gap-3">
            <div class="w-11 h-11 rounded-xl bg-gradient-to-r from-green-500 to-blue-600 flex items-center justify-center text-white text-xl shadow-lg">
                🌿
            </div>

            <div>
                <h1 class="text-xl font-black text-green-700">VolunteerHub</h1>
                <p class="text-[11px] text-gray-500">Make a Difference</p>
            </div>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex items-center gap-7 font-medium text-gray-700">
            <a href="/" class="hover:text-green-600 transition">Home</a>
            <a href="#events" class="hover:text-green-600 transition">Events</a>
            <a href="#about" class="hover:text-green-600 transition">About</a>
            <a href="#contact" class="hover:text-green-600 transition">Contact</a>
        </div>

        <!-- Buttons -->
        <div class="hidden lg:flex items-center gap-3">
            <a href="/login"
               class="px-4 py-2 rounded-full border border-green-600 text-green-700 hover:bg-green-50 transition font-semibold">
                Login
            </a>

            <a href="/register"
               class="px-5 py-2 rounded-full bg-gradient-to-r from-green-600 to-blue-600 text-white shadow-lg hover:scale-105 transition">
                Join Now
            </a>
        </div>

        <!-- Mobile -->
        <button id="menuBtn" class="lg:hidden text-3xl text-green-700">
            ☰
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden lg:hidden bg-white border-t border-gray-200">
        <div class="px-6 py-5 flex flex-col gap-4">
            <a href="/">🏠 Home</a>
            <a href="#events">📅 Events</a>
            <a href="#about">ℹ️ About</a>
            <a href="#contact">📞 Contact</a>

            <hr>

            <a href="/login" class="text-green-700 font-semibold">Login</a>

            <a href="/register"
               class="bg-gradient-to-r from-green-600 to-blue-600 text-white rounded-xl py-3 text-center">
                Join Community
            </a>
        </div>
    </div>

</header>

<!-- Navbar Space -->
<div class="h-20"></div>

<!-- ================= PAGE CONTENT ================= -->
<main>
    @yield('content')
</main>

<!-- ================= COMPACT FOOTER ================= -->
<footer id="contact" class="bg-gray-950 text-white mt-12">

    <div class="max-w-7xl mx-auto px-6 py-8">

        <div class="grid md:grid-cols-3 gap-8">

            <!-- Brand -->
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-r from-green-500 to-blue-500 flex items-center justify-center text-xl">
                        🌿
                    </div>

                    <h2 class="text-xl font-bold">VolunteerHub</h2>
                </div>

                <p class="text-sm text-gray-400 leading-6">
                    Join NGOs, participate in volunteer events and make a positive impact in your community.
                </p>
            </div>

            <!-- Links -->
            <div>
                <h3 class="font-semibold text-green-400 mb-3">Quick Links</h3>

                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="/" class="hover:text-white">Home</a></li>
                    <li><a href="#events" class="hover:text-white">Events</a></li>
                    <li><a href="#about" class="hover:text-white">About</a></li>
                    <li><a href="/login" class="hover:text-white">Login</a></li>
                    <li><a href="/register" class="hover:text-white">Register</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="font-semibold text-green-400 mb-3">Contact</h3>

                <div class="space-y-2 text-sm text-gray-400">
                    <p>📍 Nashik, Maharashtra</p>
                    <p>📧 volunteerhub@gmail.com</p>
                    <p>📞 +91 9960153691</p>
                </div>

                <!-- Social Icons -->
                <div class="flex gap-3 mt-4">

                    <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-green-600 transition cursor-pointer">
                        🌐
                    </div>

                    <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-blue-600 transition cursor-pointer">
                        📘
                    </div>

                    <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center hover:bg-pink-600 transition cursor-pointer">
                        📷
                    </div>

                </div>
            </div>

        </div>

        <!-- Bottom -->
        <div class="border-t border-gray-800 mt-6 pt-4 text-center text-xs text-gray-500">
           © 2026 VolunteerHub • Built with Laravel 12 + PostgreSQL + Tailwind CSS
Designed & Developed by Nikhil Khairnar

        </div>

    </div>

</footer>

<!-- ================= JS ================= -->
<script>
const menuBtn = document.getElementById("menuBtn");
const mobileMenu = document.getElementById("mobileMenu");

menuBtn.addEventListener("click", () => {
    mobileMenu.classList.toggle("hidden");
});

const navbar = document.getElementById("navbar");

window.addEventListener("scroll", () => {
    if (window.scrollY > 20) {
        navbar.classList.add("shadow-lg","bg-white/95");
    } else {
        navbar.classList.remove("shadow-lg","bg-white/95");
    }
});
</script>

</body>
</html>