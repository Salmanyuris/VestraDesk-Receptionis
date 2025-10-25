<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'VestraDesk - Resepsionis Digital')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/VestraDesk.png') }}">

    <!-- External Resources -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: "Poppins", sans-serif;
        }

        .mobile-menu {
            transition: all 0.3s ease-in-out;
            transform: translateX(100%);
        }

        .mobile-menu.open {
            transform: translateX(0);
        }

        .menu-overlay {
            transition: opacity 0.3s ease-in-out;
            direction: rtl;
        }
    </style>

    @yield('styles')
</head>

<body class="bg-slate-100 min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg border-b border-slate-200 sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo Section -->
                <div class="flex items-center space-x-3">
                    <a href="/"
                        class="flex items-center space-x-3 hover:opacity-80 transition duration-200">
                        <img src="{{ asset('assets/VestraDesk.png') }}" alt="VestraDesk Logo"
                            class="w-10 h-10 object-contain">
                        <div>
                            <h1 class="text-xl font-bold">
                                <span class="text-indigo-600">Vestra</span><span
                                    class="text-black">Desk</span>
                            </h1>
                            <p class="text-xs text-slate-500">Visitor Management System</p>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/"
                        class="text-slate-700 hover:text-indigo-600 font-medium transition duration-200 {{ request()->is('/') ? 'text-indigo-600' : '' }}">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                    <a href="/about"
                        class="text-slate-700 hover:text-indigo-600 font-medium transition duration-200 {{ request()->is('about') ? 'text-indigo-600' : '' }}">
                        <i class="fas fa-info-circle mr-2"></i>Tentang
                    </a>
                    <a href="/contact"
                        class="text-slate-700 hover:text-indigo-600 font-medium transition duration-200 {{ request()->is('contact') ? 'text-indigo-600' : '' }}">
                        <i class="fas fa-phone mr-2"></i>Kontak
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="/admin"
                        class="hidden md:flex bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-lg font-semibold transition-all duration-300 ease-in-out hover:shadow-lg hover:-translate-y-0.5 transform items-center space-x-2">
                        <i class="fas fa-lock mr-2"></i>
                        <span>Admin Login</span>
                    </a>

                    <button id="mobileMenuToggle"
                        class="md:hidden text-slate-600 hover:text-indigo-600 transition duration-200">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div id="mobileMenuOverlay"
        class="menu-overlay fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>

    <!-- Mobile Menu Sidebar -->
    <div id="mobileMenu"
        class="mobile-menu fixed top-0 right-0 h-full w-64 bg-white shadow-2xl z-50 md:hidden">
        <div class="flex items-center justify-between p-4 border-b border-slate-200">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('assets/VestraDesk.png') }}" alt="VestraDesk Logo"
                    class="w-8 h-8 object-contain">
                <span class="font-bold text-slate-800">Menu</span>
            </div>
            <button id="mobileMenuClose"
                class="text-slate-500 hover:text-indigo-600 transition duration-200">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <div class="p-4 space-y-4">
            <a href="/"
                class="flex items-center space-x-3 p-3 rounded-lg text-slate-700 hover:bg-indigo-50 hover:text-indigo-600 transition duration-200 {{ request()->is('/') ? 'bg-indigo-50 text-indigo-600' : '' }}">
                <i class="fas fa-home w-5 text-center"></i>
                <span>Home</span>
            </a>

            <a href="/about"
                class="flex items-center space-x-3 p-3 rounded-lg text-slate-700 hover:bg-indigo-50 hover:text-indigo-600 transition duration-200 {{ request()->is('about') ? 'bg-indigo-50 text-indigo-600' : '' }}">
                <i class="fas fa-info-circle w-5 text-center"></i>
                <span>Tentang Kami</span>
            </a>

            <a href="/contact"
                class="flex items-center space-x-3 p-3 rounded-lg text-slate-700 hover:bg-indigo-50 hover:text-indigo-600 transition duration-200 {{ request()->is('contact') ? 'bg-indigo-50 text-indigo-600' : '' }}">
                <i class="fas fa-phone w-5 text-center"></i>
                <span>Kontak</span>
            </a>

            <a href="/admin"
                class="flex items-center space-x-3 p-3 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition duration-200 mt-4">
                <i class="fas fa-lock w-5 text-center"></i>
                <span>Admin Login</span>
            </a>
        </div>

        <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-slate-200">
            <div class="text-center text-slate-500 text-sm">
                <p>VestraDesk &copy; 2025</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-800 text-white border-t border-slate-700 mt-auto">
        <div class="container mx-auto px-4 py-8">
            <div class="grid md:grid-cols-4 gap-8">

                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="{{ asset('assets/VestraDesk.png') }}" alt="VestraDesk Logo"
                            class="w-10 h-10 object-contain">
                        <h3 class="text-xl font-bold">
                            <span class="text-indigo-400">Vestra</span><span
                                class="text-white">Desk</span>
                        </h3>
                    </div>
                    <p class="text-slate-300 text-sm mb-4">
                        Sistem manajemen tamu digital yang modern dan efisien untuk perusahaan Anda.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="text-slate-300 hover:text-white transition duration-200">
                            <i class="fab fa-facebook text-lg"></i>
                        </a>
                        <a href="#"
                            class="text-slate-300 hover:text-white transition duration-200">
                            <i class="fab fa-twitter text-lg"></i>
                        </a>
                        <a href="#"
                            class="text-slate-300 hover:text-white transition duration-200">
                            <i class="fab fa-linkedin text-lg"></i>
                        </a>
                        <a href="#"
                            class="text-slate-300 hover:text-white transition duration-200">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-semibold text-lg mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2 text-slate-300">
                        <li>
                            <a href="/"
                                class="hover:text-white transition duration-200 flex items-center space-x-2">
                                <i class="fas fa-chevron-right text-xs"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="/about"
                                class="hover:text-white transition duration-200 flex items-center space-x-2">
                                <i class="fas fa-chevron-right text-xs"></i>
                                <span>Tentang Kami</span>
                            </a>
                        </li>
                        <li>
                            <a href="/contact"
                                class="hover:text-white transition duration-200 flex items-center space-x-2">
                                <i class="fas fa-chevron-right text-xs"></i>
                                <span>Kontak</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin"
                                class="hover:text-white transition duration-200 flex items-center space-x-2">
                                <i class="fas fa-chevron-right text-xs"></i>
                                <span>Admin Panel</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="font-semibold text-lg mb-4">Kontak</h4>
                    <ul class="space-y-3 text-slate-300">
                        <li class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-indigo-400 mt-1"></i>
                            <span class="text-sm">Jl. Cenggini, Kec. Balapulang, Kab. Tegal, Jawa
                                Tengah</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-phone text-indigo-400"></i>
                            <span class="text-sm">83103743655</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-indigo-400"></i>
                            <span class="text-sm">VestraDesk@company.com</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-clock text-indigo-400"></i>
                            <span class="text-sm">Senin - Jumat: 08:00 - 17:00</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div
                class="border-t border-slate-700 mt-8 pt-6 flex flex-col md:flex-row justify-between items-center">
                <p class="text-slate-400 text-sm mb-4 md:mb-0">
                    © 2025 VestraDesk. All rights reserved.
                </p>
                <div class="flex space-x-6 text-sm text-slate-400">
                    <a href="#" class="hover:text-white transition duration-200">Privacy
                        Policy</a>
                    <a href="#" class="hover:text-white transition duration-200">Terms of
                        Service</a>
                    <a href="#" class="hover:text-white transition duration-200">Cookie
                        Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenuClose = document.getElementById('mobileMenuClose');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');

        function openMobileMenu() {
            mobileMenu.classList.add('open');
            mobileMenuOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            mobileMenu.classList.remove('open');
            mobileMenuOverlay.classList.add('hidden');
            document.body.style.overflow = '';
        }

        mobileMenuToggle.addEventListener('click', openMobileMenu);
        mobileMenuClose.addEventListener('click', closeMobileMenu);
        mobileMenuOverlay.addEventListener('click', closeMobileMenu);

        const mobileNavLinks = document.querySelectorAll('#mobileMenu a');
        mobileNavLinks.forEach(link => {
            link.addEventListener('click', closeMobileMenu);
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && mobileMenu.classList.contains('open')) {
                closeMobileMenu();
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                closeMobileMenu();
            }
        });
    </script>

    @yield('scripts')
</body>

</html>
