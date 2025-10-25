@extends('layouts.app')

@section('title', 'Tentang Kami - VestraDesk')

@section('content')
<!-- Hero Section -->
<section 
    class="relative bg-cover bg-center bg-no-repeat text-white py-20"
    style="background-image: url('{{ asset('assets/bg-office.webp') }}');">

    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/90 via-blue-800/70 to-slate-900/80"></div>

    <div class="relative container mx-auto px-4 text-center z-10">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">
            Tentang VestraDesk
        </h1>
        <p class="text-xl text-blue-100 max-w-3xl mx-auto animate-fade-in-up">
            Solusi modern untuk manajemen tamu dan kunjungan di Perusahaan
        </p>
    </div>
</section>

<!-- Content Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 mb-16">
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-slate-200">
                <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-eye text-indigo-600 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">Visi Kami</h3>
                <p class="text-slate-600 leading-relaxed">
                    Menjadi platform manajemen tamu terdepan yang memberikan pengalaman check-in 
                    yang efisien, aman, dan modern bagi perusahaan-perusahaan di Indonesia.
                </p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg border border-slate-200">
                <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-bullseye text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">Misi Kami</h3>
                <ul class="text-slate-600 space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span>Menyediakan sistem resepsionis digital yang user-friendly</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span>Meningkatkan efisiensi proses check-in tamu</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                        <span>Memastikan keamanan data kunjungan tamu</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Features -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-center text-slate-800 mb-12">Fitur Unggulan</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center bg-white p-8 rounded-2xl shadow-lg border border-slate-200 hover:shadow-xl transition duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-user-check text-blue-600 text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-slate-800 mb-4">Check-in Cepat</h4>
                    <p class="text-slate-600">
                        Proses check-in tamu yang cepat dan mudah dengan form yang intuitif
                    </p>
                </div>

                <div class="text-center bg-white p-8 rounded-2xl shadow-lg border border-slate-200 hover:shadow-xl transition duration-300">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-chart-line text-green-600 text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-slate-800 mb-4">Analitik Real-time</h4>
                    <p class="text-slate-600">
                        Dashboard dengan statistik kunjungan dan laporan lengkap
                    </p>
                </div>

                <div class="text-center bg-white p-8 rounded-2xl shadow-lg border border-slate-200 hover:shadow-xl transition duration-300">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-bell text-purple-600 text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-slate-800 mb-4">Notifikasi Otomatis</h4>
                    <p class="text-slate-600">
                        Sistem notifikasi ketika tamu datang kepada karyawan yang bersangkutan
                    </p>
                </div>
            </div>
        </div>

        <!-- Technology Section -->
        <div class="bg-slate-100 rounded-2xl p-12">
            <h2 class="text-3xl font-bold text-center text-slate-800 mb-12">Teknologi Kami</h2>
            <div class="grid md:grid-cols-4 gap-6 text-center">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <i class="fab fa-laravel text-red-500 text-4xl mb-4"></i>
                    <h4 class="font-semibold text-slate-800">Laravel 11</h4>
                    <p class="text-slate-600 text-sm mt-2">Backend Framework</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <i class="fab fa-php text-purple-500 text-4xl mb-4"></i>
                    <h4 class="font-semibold text-slate-800">PHP 8.2</h4>
                    <p class="text-slate-600 text-sm mt-2">Programming Language</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <i class="fab fa-js-square text-yellow-500 text-4xl mb-4"></i>
                    <h4 class="font-semibold text-slate-800">JavaScript</h4>
                    <p class="text-slate-600 text-sm mt-2">Frontend Interactivity</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <i class="fas fa-database text-blue-500 text-4xl mb-4"></i>
                    <h4 class="font-semibold text-slate-800">MySQL</h4>
                    <p class="text-slate-600 text-sm mt-2">Database System</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section  -->
<section class="to-slate-100 py-20 relative overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <h2 class="text-4xl font-extrabold text-center text-slate-800 mb-14">
            FAQ<span class="text-indigo-600"></span>
        </h2>

        <div class="max-w-3xl mx-auto space-y-6">
            @php
                $faqs = [
                    [
                        'q' => 'Bagaimana cara menggunakan sistem VestraDesk?',
                        'a' => 'Sistem kami sangat mudah digunakan. Tamu cukup mengisi form check-in di halaman utama, dan data akan otomatis tersimpan ke database. Admin dapat mengelola data melalui panel admin.'
                    ],
                    [
                        'q' => 'Apakah sistem ini bisa diintegrasikan dengan sistem lain?',
                        'a' => 'Ya, kami menyediakan API untuk integrasi dengan sistem HR, security, atau sistem lain yang digunakan perusahaan Anda.'
                    ],
                    [
                        'q' => 'Berapa biaya implementasi sistem ini?',
                        'a' => 'Biaya tergantung pada kebutuhan dan skala perusahaan Anda. Silakan hubungi kami untuk konsultasi dan penawaran harga yang sesuai.'
                    ],
                ];
            @endphp

            @foreach ($faqs as $index => $faq)
            <div 
                x-data="{ open: false }" 
                x-init="setTimeout(() => $el.classList.add('opacity-100', 'translate-y-0'), {{ $index * 150 }})"
                class="opacity-0 translate-y-6 transform transition-all duration-700 ease-out bg-white rounded-2xl shadow-md  hover:shadow-xl hover:border-indigo-400 overflow-hidden">
                
                <button 
                    @click="open = !open"
                    class="w-full flex justify-between items-center px-6 py-5 text-left focus:outline-none">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-indigo-100 text-indigo-600 flex items-center justify-center rounded-xl mr-4 transition-transform duration-300"
                             :class="open ? 'rotate-180 bg-indigo-200' : ''">
                            <i class="fas fa-question-circle text-lg"></i>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-800">{{ $faq['q'] }}</h3>
                    </div>
                    <i class="fas fa-chevron-down text-slate-500 transition-transform duration-300" 
                       :class="open ? 'rotate-180 text-indigo-600' : ''"></i>
                </button>

                <div x-show="open" x-collapse x-transition.opacity.duration.400ms class="px-6 pb-6 text-slate-600 leading-relaxed text-sm">
                    {{ $faq['a'] }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-[800px] h-[800px] opacity-20 blur-3xl rounded-full"></div>
</section>

<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<!-- CTA Section -->
<section class="bg-indigo-600 py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">Siap Mengoptimalkan Manajemen Tamu Anda?</h2>
        <p class="text-indigo-100 text-lg mb-8 max-w-2xl mx-auto">
            Mulai gunakan VestraDesk hari ini dan rasakan kemudahan dalam mengelola kunjungan tamu.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/" class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-slate-100 transition duration-300">
                <i class="fas fa-play mr-2"></i>Mulai Check-in
            </a>
            <a href="/contact" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition duration-300">
                <i class="fas fa-envelope mr-2"></i>Hubungi Kami
            </a>
        </div>
    </div>
</section>
@endsection