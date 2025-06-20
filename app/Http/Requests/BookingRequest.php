<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Pesanan;
use Carbon\Carbon;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'customer';
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'id_lapangan' => 'required|exists:lapangan,id',
            'nama_lengkap' => 'required|string|max:255|min:2',
            'alamat' => 'required|string|max:500|min:10',
            'no_telepon' => 'required|string|max:15|min:10|regex:/^[0-9+\-\s]+$/',
            'tanggal' => [
                'required',
                'date',
                'after:today',
                'before:' . Carbon::now()->addMonths(3)->toDateString(), // Maksimal 3 bulan ke depan
            ],
            'jam' => 'required|array|min:1|max:8',
            'jam.*' => 'required|string|in:08:00,09:00,10:00,11:00,12:00,13:00,14:00,15:00,16:00,17:00,18:00,19:00,20:00,21:00,22:00',
            'catatan' => 'nullable|string|max:500',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'id_lapangan.required' => 'Lapangan wajib dipilih.',
            'id_lapangan.exists' => 'Lapangan yang dipilih tidak valid.',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'nama_lengkap.min' => 'Nama lengkap minimal 2 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.min' => 'Alamat minimal 10 karakter.',
            'no_telepon.required' => 'Nomor telepon wajib diisi.',
            'no_telepon.min' => 'Nomor telepon minimal 10 digit.',
            'no_telepon.regex' => 'Format nomor telepon tidak valid.',
            'tanggal.required' => 'Tanggal booking wajib dipilih.',
            'tanggal.after' => 'Tanggal booking harus minimal besok.',
            'tanggal.before' => 'Tanggal booking maksimal 3 bulan ke depan.',
            'jam.required' => 'Jam booking wajib dipilih.',
            'jam.min' => 'Minimal pilih 1 jam.',
            'jam.max' => 'Maksimal booking 8 jam per hari.',
            'jam.*.in' => 'Jam yang dipilih tidak valid.',
            'catatan.max' => 'Catatan maksimal 500 karakter.',
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Validasi jam berurutan
            if ($this->has('jam') && is_array($this->jam)) {
                $jamDipilih = $this->jam;
                sort($jamDipilih);
                
                for ($i = 1; $i < count($jamDipilih); $i++) {
                    $currentHour = (int) substr($jamDipilih[$i], 0, 2);
                    $prevHour = (int) substr($jamDipilih[$i-1], 0, 2);
                    
                    if ($currentHour - $prevHour > 1) {
                        $validator->errors()->add('jam', 'Jam booking harus berurutan.');
                        break;
                    }
                }
            }

            // Validasi ketersediaan jam
            if ($this->has(['id_lapangan', 'tanggal', 'jam'])) {
                $pesananPadaTanggal = Pesanan::where('id_lapangan', $this->id_lapangan)
                    ->where('tanggal', $this->tanggal)
                    ->whereNotIn('status', [Pesanan::STATUS_REJECTED, Pesanan::STATUS_CANCELLED])
                    ->pluck('jam');

                $jamSudahDipesan = $pesananPadaTanggal->flatMap(function ($jam) {
                    return explode(', ', $jam);
                })->toArray();

                foreach ($this->jam as $jam) {
                    if (in_array($jam, $jamSudahDipesan)) {
                        $validator->errors()->add('jam', "Jam $jam sudah dipesan. Silakan pilih jam lain.");
                        break;
                    }
                }
            }

            // Validasi hari libur (contoh: tidak bisa booking di hari Senin)
            if ($this->has('tanggal')) {
                $dayOfWeek = Carbon::parse($this->tanggal)->dayOfWeek;
                // 1 = Monday, 0 = Sunday
                if ($dayOfWeek == 1) {
                    $validator->errors()->add('tanggal', 'Booking tidak tersedia di hari Senin (hari libur).');
                }
            }
        });
    }
}
