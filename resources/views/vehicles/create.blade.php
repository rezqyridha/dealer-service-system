@extends('layouts.app') @section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Kendaraan Baru</h2>

                @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('vehicles.store') }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <label for="customer_id" class="block text-gray-700 font-semibold mb-2">Pilih Pelanggan</label>
                        <select id="customer_id" name="customer_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                            <option value="">-- Pilih Pelanggan --</option>
                            @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('customer_id')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="plate_number" class="block text-gray-700 font-semibold mb-2">Plat Nomor</label>
                        <input type="text" id="plate_number" name="plate_number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('plate_number') }}" placeholder="Contoh: B 1234 ABC" required>
                        @error('plate_number')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="model" class="block text-gray-700 font-semibold mb-2">Model Kendaraan</label>
                        <input type="text" id="model" name="model" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('model') }}" placeholder="Contoh: Mitsubishi Xpander" required>
                        @error('model')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="year" class="block text-gray-700 font-semibold mb-2">Tahun</label>
                        <input type="number" id="year" name="year" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('year') }}" placeholder="Contoh: 2023" min="1900" max="{{ date('Y') }}" required>
                        @error('year')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                            Simpan
                        </button>
                        <a href="{{ route('vehicles.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
