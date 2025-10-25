<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Visit;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class VisitController extends Controller
{
    public function checkin(Request $request): JsonResponse
    {
        \Log::info('Check-in request data:', $request->all());

        // Validasi data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'employee_id' => 'required|exists:employees,id',
            'purpose' => 'required|string|max:500',
            'company' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        try {
            \Log::info('Creating guest with phone: ' . $validated['phone']);

            // Cari guest berdasarkan phone, atau buat baru
            $guest = Guest::firstOrCreate(
                ['phone' => $validated['phone']],
                [
                    'name' => $validated['name'],
                    'company' => $validated['company'] ?? null,
                    'email' => $validated['email'] ?? null,
                ]
            );

            \Log::info('Guest found/created:', ['id' => $guest->id, 'name' => $guest->name]);

            // Update guest data jika ada perubahan
            $guest->update([
                'name' => $validated['name'],
                'company' => $validated['company'] ?? null,
                'email' => $validated['email'] ?? null,
            ]);

            // Buat visit record
            $visit = Visit::create([
                'guest_id' => $guest->id,
                'employee_id' => $validated['employee_id'],
                'check_in' => now(),
                'purpose' => $validated['purpose'],
                'status' => 'checked_in',
            ]);

            \Log::info('Visit created:', ['id' => $visit->id]);

            return response()->json([
                'success' => true,
                'message' => 'Check-in berhasil! Selamat datang ' . $validated['name'],
                'data' => [
                    'visit_id' => $visit->id,
                    'guest_name' => $guest->name,
                    'check_in_time' => $visit->check_in->format('H:i'),
                    'employee_id' => $visit->employee_id,
                ]
            ], 201);

        } catch (\Exception $e) {
            \Log::error('Check-in error: ' . $e->getMessage());
            \Log::error('Error trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem: ' . $e->getMessage()
            ], 500);
        }
    }
}