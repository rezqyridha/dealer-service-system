@extends('layouts.app') @section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        Detail Servis
                    </h2>
                    <a
                        href="{{ route('services.index') }}"
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

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Kode Servis</label
                        >
                        <p class="text-blue-600 font-bold text-lg">
                            {{ $service->service_code }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Status</label
                        >
                        <span
                            class="px-3 py-1 rounded-full text-white font-semibold @if ($service->status === 'pending') bg-yellow-500 @elseif ($service->status === 'completed') bg-green-500 @elseif ($service->status === 'cancelled') bg-red-500 @else bg-gray-500 @endif"
                        >
                            {{ ucfirst($service->status) }}
                        </span>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Pelanggan</label
                        >
                        <p class="text-gray-800">
                            {{ $service->vehicle->customer->name }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Plat Kendaraan</label
                        >
                        <p class="text-gray-800">
                            {{ $service->vehicle->plate_number }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Jenis Kendaraan</label
                        >
                        <p class="text-gray-800">
                            {{ $service->vehicle->type }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Teknisi</label
                        >
                        <p class="text-gray-800">
                            {{ $service->technician->name }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Tanggal Servis</label
                        >
                        <p class="text-gray-800">
                            {{ \Carbon\Carbon::parse($service->service_date)->format('d/m/Y') }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Jenis Servis</label
                        >
                        <p class="text-gray-800">
                            {{ $service->service_type }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Dibuat Tanggal</label
                        >
                        <p class="text-gray-800">
                            {{ $service->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>

                <div class="mt-6 flex gap-2">
                    @if ($service->status !== 'completed')
                    <form
                        action="{{ route('services.update', $service) }}"
                        method="POST"
                        class="inline"
                    >
                        @csrf @method('PUT')
                        <input type="hidden" name="status" value="completed" />
                        <button
                            type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded"
                            onclick="return confirm('Selesaikan servis ini?')"
                        >
                            Selesaikan
                        </button>
                    </form>
                    @endif
                    <a
                        href="{{ route('services.edit', $service) }}"
                        class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-6 rounded"
                    >
                        Edit
                    </a>
                    <form
                        action="{{ route('services.destroy', $service) }}"
                        method="POST"
                        class="inline"
                    >
                        @csrf @method('DELETE')
                        <button
                            type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded"
                            onclick="return confirm('Hapus servis ini?')"
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
