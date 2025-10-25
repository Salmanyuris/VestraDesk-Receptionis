@extends('layouts.app')

@section('title', 'Kontak - VestraDesk')

@section('content')
<!-- Hero Section -->
<section 
    class="relative bg-cover bg-center bg-no-repeat text-white py-20"
    style="background-image: url('{{ asset('assets/bg-office.webp') }}');">

    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/90 via-blue-800/70 to-slate-900/80"></div>

    <div class="relative container mx-auto px-4 text-center z-10">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-down">
            Hubungi Kami
        </h1>
        <p class="text-xl text-blue-100 max-w-3xl mx-auto animate-fade-in-up">
            Kami siap membantu Anda dalam mengimplementasikan sistem resepsionis digital
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-slate-200">
                <h2 class="text-2xl font-bold text-slate-800 mb-6">Kirim Pesan</h2>
                <form class="space-y-6">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap *</label>
                            <input type="text" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Email *</label>
                            <input type="email" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Perusahaan</label>
                        <input type="text" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Subjek *</label>
                        <input type="text" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Pesan *</label>
                        <textarea rows="5" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>

                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300 ease-in-out hover:shadow-lg transform hover:-translate-y-0.5">
                        <i class="fas fa-paper-plane mr-2"></i>Kirim Pesan
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="space-y-8">
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-lg border border-slate-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-map-marker-alt text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="font-semibold text-slate-800 mb-2">Alamat Kantor</h3>
                        <p class="text-slate-600 text-sm">
                            Jl. Cenggini, Kec. Balapulang<br>
                            Kab. Tegal, Jawa Tengah<br>
                            Indonesia
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg border border-slate-200">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-phone text-green-600 text-xl"></i>
                        </div>
                        <h3 class="font-semibold text-slate-800 mb-2">Telepon</h3>
                        <p class="text-slate-600 text-sm">
                            83103743655<br>
                            Senin - Jumat, 08:00 - 17:00
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg border border-slate-200">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-envelope text-purple-600 text-xl"></i>
                        </div>
                        <h3 class="font-semibold text-slate-800 mb-2">Email</h3>
                        <p class="text-slate-600 text-sm">
                            VestraDesk@company.com<br>
                            support@company.com
                        </p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg border border-slate-200">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-clock text-orange-600 text-xl"></i>
                        </div>
                        <h3 class="font-semibold text-slate-800 mb-2">Jam Operasional</h3>
                        <p class="text-slate-600 text-sm">
                            Senin - Jumat: 08:00 - 17:00<br>
                            Sabtu: 08:00 - 12:00<br>
                            Minggu: Tutup
                        </p>
                    </div>
                </div>

                <!-- Map Placeholder -->
                <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden">
                    <div class="bg-slate-200 h-48 flex items-center justify-center">
                        <div class="text-center text-slate-500">
                            <i class="fas fa-map text-3xl mb-2"></i>
                            <p class="text-sm">Peta Lokasi Kantor</p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="bg-white rounded-xl p-6 shadow-lg border border-slate-200">
                    <h3 class="font-semibold text-slate-800 mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-blue-600 text-white rounded-lg flex items-center justify-center hover:bg-blue-700 transition duration-200">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-400 text-white rounded-lg flex items-center justify-center hover:bg-blue-500 transition duration-200">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-700 text-white rounded-lg flex items-center justify-center hover:bg-blue-800 transition duration-200">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-pink-600 text-white rounded-lg flex items-center justify-center hover:bg-pink-700 transition duration-200">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection