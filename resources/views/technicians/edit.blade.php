@extends('layouts.app') @section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Teknisi</h2>

                @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('technicians.update', $technician) }}" method="POST">
                    @csrf @method('PUT')

                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Teknisi</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('name', $technician->name) }}" required>
                        @error('name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="phone" class="block text-gray-700 font-semibold mb-2">No Telepon</label>
                        <input type="text" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('phone', $technician->phone) }}" required>
                        @error('phone')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="specialization" class="block text-gray-700 font-semibold mb-2">Spesialisasi</label>
                        <select id="specialization" name="specialization" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                            <option value="">-- Pilih Spesialisasi --</option>
                            <option value="Mesin & Transmisi" {{ old('specialization', $technician->specialization) == 'Mesin & Transmisi' ? 'selected' : '' }}>Mesin & Transmisi</option>
                            <option value="Elektrik & Battery" {{ old('specialization', $technician->specialization) == 'Elektrik & Battery' ? 'selected' : '' }}>Elektrik & Battery</option>
                            <option value="AC & Pendingin" {{ old('specialization', $technician->specialization) == 'AC & Pendingin' ? 'selected' : '' }}>AC & Pendingin</option>
                            <option value="Chassis & Brake" {{ old('specialization', $technician->specialization) == 'Chassis & Brake' ? 'selected' : '' }}>Chassis & Brake</option>
                            <option value="Body & Paint" {{ old('specialization', $technician->specialization) == 'Body & Paint' ? 'selected' : '' }}>Body & Paint</option>
                            <option value="Interior" {{ old('specialization', $technician->specialization) == 'Interior' ? 'selected' : '' }}>Interior</option>
                        </select>
                        @error('specialization')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                            Perbarui
                        </button>
                        <a href="{{ route('technicians.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
