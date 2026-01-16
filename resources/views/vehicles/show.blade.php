@extends('layouts.app') @section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        Detail Kendaraan
                    </h2>
                    <a
                        href="{{ route('vehicles.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded"
                    >
                        Kembali
                    </a>
                </div>

                @if ($message = Session::get('success'))
                <div
                    class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded"
                >
                    {{ $message }}
                </div>
                @endif

                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Plat Nomor</label
                        >
                        <p class="text-blue-600 font-bold text-lg">
                            {{ $vehicle->plate_number }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Model Kendaraan</label
                        >
                        <p class="text-gray-800">{{ $vehicle->model }}</p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Tahun</label
                        >
                        <p class="text-gray-800">{{ $vehicle->year }}</p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Pelanggan</label
                        >
                        <p class="text-gray-800">
                            {{ $vehicle->customer->name }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >No Telepon Pelanggan</label
                        >
                        <p class="text-gray-700">
                            {{ $vehicle->customer->phone }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Alamat Pelanggan</label
                        >
                        <p class="text-gray-700">
                            {{ $vehicle->customer->address }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Dibuat Tanggal</label
                        >
                        <p class="text-gray-700">
                            {{ $vehicle->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Diperbarui Tanggal</label
                        >
                        <p class="text-gray-700">
                            {{ $vehicle->updated_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>

                <div class="mt-6 flex gap-2">
                    <a
                        href="{{ route('vehicles.edit', $vehicle) }}"
                        class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-6 rounded"
                    >
                        Edit
                    </a>
                    <form
                        action="{{ route('vehicles.destroy', $vehicle) }}"
                        method="POST"
                        class="inline"
                        onsubmit="return confirm('Yakin ingin menghapus?')"
                    >
                        @csrf @method('DELETE')
                        <button
                            type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded"
                        >
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
