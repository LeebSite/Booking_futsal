@extends('customer.customer_layout')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-2xl font-bold mb-5">Booking Lapangan</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form method="POST" action="{{ route('customer.booking.store') }}" class="bg-white shadow-md rounded p-6">
        @csrf
        <input type="hidden" name="id_lapangan" value="{{ $lapangan->id }}">
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Nama Lapangan:</label>
            <input type="text" value="{{ $lapangan->nama_lapangan }}" readonly class="border rounded w-full p-2 bg-gray-100">
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Harga/Jam:</label>
            <input type="text" value="Rp{{ number_format($lapangan->harga_per_jam, 0, ',', '.') }}" readonly class="border rounded w-full p-2 bg-gray-100">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Nama Lengkap:</label>
            <input type="text" name="nama_lengkap" required class="border rounded w-full p-2" placeholder="Isi nama lengkap">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Alamat:</label>
            <textarea name="alamat" required class="border rounded w-full p-2" placeholder=" Isi alamat rumah dengan lengkap"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">No. Telepon:</label>
            <input type="text" name="no_telepon" required class="border rounded w-full p-2" placeholder="Isi nomor telepon yang bisa dihubungi">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Tanggal:</label>
            <input type="date" name="tanggal" value="{{ $tanggalDipilih }}" class="border rounded w-full p-2" onchange="location.href='?tanggal=' + this.value">
        </div>        

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Jam:</label>
            <input type="hidden" id="jam" name="jam[]" value="" /> <!-- Input tersembunyi untuk jam -->
            <input type="text" id="selected-jam" readonly class="border rounded w-full p-2 bg-gray-100 mb-3" placeholder="Jam yang dipilih" />
            <div class="grid grid-cols-4 gap-2 mb-3">
                @foreach ($jamTersedia as $jam) 
                    <label class="cursor-pointer">
                        <span class="px-4 py-2 border rounded block text-center hover:bg-green-200 {{ is_array(old('jam', [])) && in_array($jam, old('jam', [])) ? 'bg-green-300' : 'bg-white' }}" onclick="toggleJam(this, '{{ $jam }}')">
                            {{ $jam }}
                        </span>
                    </label>
                @endforeach
            </div>
        </div>        

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">Booking Lapangan</button>
    </form>
</div>

<script>
    const selectedJamInput = document.getElementById('selected-jam');

    function toggleJam(element, jam) {
        const currentValue = selectedJamInput.value.split(', ').filter(Boolean);
        const jamInput = document.getElementById('jam');

        if (currentValue.includes(jam)) {
            // Jika jam sudah ada, hapus dari input
            const newValue = currentValue.filter(j => j !== jam);
            selectedJamInput.value = newValue.join(', ');
            jamInput.value = newValue.join(', '); // Update input tersembunyi
            element.classList.remove('bg-green-300');
        } else {
            // Jika jam belum ada, tambahkan ke input
            currentValue.push(jam);
            selectedJamInput.value = currentValue.join(', ');
            jamInput.value = currentValue.join(', '); // Update input tersembunyi
            element.classList.add('bg-green-300');
        }
    }
</script>
@endsection