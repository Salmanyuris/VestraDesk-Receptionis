@extends('layouts.app')

@section('title', 'VestraDesk - Resepsionis Digital')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="text-center mb-8">
        <div class="flex items-center justify-center mb-4 space-x-4">
            <img src="{{ asset('assets/VestraDesk.png') }}" alt="VestraDesk Logo" class="w-16 h-16 object-contain">
            <h1 class="text-4xl font-bold">
                <span class="text-indigo-600">Vestra</span><span class="text-slate-800">Desk</span>
            </h1>
        </div>
        <p class="text-slate-600 text-lg">Silakan lakukan check-in untuk kunjungan Anda</p>
    </div>

    <!-- Check-in Form Card -->
    <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden">
        <div class="md:flex">
            <div class="md:w-2/3 p-8">
                <h2 class="text-2xl font-bold text-slate-800 mb-6">Form Check-in Tamu</h2>

                <form id="checkinForm" class="space-y-6">
                    @csrf

                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-slate-800 border-b border-slate-200 pb-2 flex items-center">
                            <i class="fas fa-user mr-2 text-indigo-500"></i>
                            Informasi Tamu
                        </h3>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap *</label>
                                <input type="text" name="name" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Perusahaan</label>
                                <input type="text" name="company" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Nomor Telepon *</label>
                                <input type="tel" name="phone" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                                <input type="email" name="email" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                            </div>
                        </div>
                    </div>

                    <!-- Visit Information Section -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-slate-800 border-b border-slate-200 pb-2 flex items-center">
                            <i class="fas fa-clipboard-list mr-2 text-indigo-500"></i>
                            Informasi Kunjungan
                        </h3>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Karyawan yang Dikunjungi *</label>
                            <select name="employee_id" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                                <option value="">Pilih Karyawan</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">
                                        {{ $employee->name }} - {{ $employee->department }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Keperluan Kunjungan *</label>
                            <textarea name="purpose" required rows="3" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" placeholder="Jelaskan keperluan kunjungan Anda..."></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300 ease-in-out flex items-center justify-center hover:shadow-lg hover:-translate-y-0.5 transform">
                            <i class="fas fa-check-circle mr-2"></i>
                            Check-in Sekarang
                        </button>
                    </div>
                </form>
            </div>

            <!-- Right Side - Information -->
            <div class="md:w-1/3 bg-gradient-to-b from-blue-700 to-indigo-800 text-white p-8 flex flex-col">
                <div class="space-y-8 flex-grow">
                    <div class="text-center">
                        <i class="fas fa-qrcode text-5xl mb-4 text-white/80"></i>
                        <h3 class="text-xl font-bold mb-2">Check-in Cepat</h3>
                        <p class="text-indigo-100 text-sm">Isi form di samping untuk melakukan check-in kunjungan Anda.</p>
                    </div>

                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                        <h4 class="font-semibold mb-3 text-base flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Informasi
                        </h4>
                        <ul class="text-sm space-y-2 text-indigo-100">
                            <li class="flex items-start">
                                <i class="fas fa-check mr-2 mt-1 text-xs"></i>
                                <span>Pastikan data yang diisi benar</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check mr-2 mt-1 text-xs"></i>
                                <span>Bawa kartu identitas yang valid</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check mr-2 mt-1 text-xs"></i>
                                <span>Patuhi peraturan yang berlaku</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check mr-2 mt-1 text-xs"></i>
                                <span>Lakukan check-out saat pulang</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Time Section -->
                <div class="text-center mt-8 pt-6 border-t border-white/20">
                    <div class="inline-flex items-center bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg text-lg font-semibold mb-2">
                        <i class="fas fa-clock mr-2"></i>
                        <span id="currentTime">{{ now()->format('H:i') }}</span>
                    </div>
                    <div class="text-indigo-100 text-sm">
                        {{ now()->translatedFormat('l, d F Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-2xl p-8 max-w-md mx-4 text-center shadow-xl">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-check text-green-600 text-3xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-slate-800 mb-2">Check-in Berhasil!</h3>
            <p class="text-slate-600 mb-6">Selamat datang, silakan menunggu di area resepsionis.</p>
            <button onclick="resetForm()" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg transition duration-200">
                Check-in Lagi
            </button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function updateTime() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const currentTimeEl = document.getElementById('currentTime');

        if (currentTimeEl) {
            currentTimeEl.textContent = `${hours}:${minutes}`;
        }
    }

    setInterval(updateTime, 1000);

    const checkinForm = document.getElementById('checkinForm');
    const successModal = document.getElementById('successModal');

    if (checkinForm) {
        checkinForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            const name = formData.get('name');
            const phone = formData.get('phone');
            const employeeId = formData.get('employee_id');
            const purpose = formData.get('purpose');

            if (!name || !phone || !employeeId || !purpose) {
                alert('Harap isi semua field yang wajib diisi!');
                return;
            }

            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
            submitBtn.disabled = true;

            try {
                const response = await fetch('/visits/checkin', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const result = await response.json();

                if (result.success) {
                    if (successModal) {
                        successModal.classList.remove('hidden');
                    }
                } else {
                    alert('Terjadi kesalahan: ' + (result.message || 'Silakan coba lagi'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan jaringan. Silakan hubungi resepsionis.');
            } finally {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        });
    }

    function resetForm() {
        if (checkinForm) {
            checkinForm.reset();
        }
        if (successModal) {
            successModal.classList.add('hidden');
        }
    }
</script>
@endsection