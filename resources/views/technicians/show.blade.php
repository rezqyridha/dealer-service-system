@extends('layouts.app') @section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        Detail Teknisi
                    </h2>
                    <a
                        href="{{ route('technicians.index') }}"
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
                            >Nama</label
                        >
                        <p class="text-gray-800 text-lg font-bold">
                            {{ $technician->name }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >No Telepon</label
                        >
                        <p class="text-gray-800">{{ $technician->phone }}</p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Spesialisasi</label
                        >
                        <span
                            class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold"
                        >
                            {{ $technician->specialization }}
                        </span>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Total Servis</label
                        >
                        <p class="text-gray-800 text-lg font-bold">
                            {{ $technician->services->count() }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Dibuat Tanggal</label
                        >
                        <p class="text-gray-700">
                            {{ $technician->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2"
                            >Diperbarui Tanggal</label
                        >
                        <p class="text-gray-700">
                            {{ $technician->updated_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>

                <div class="mt-8 border-t pt-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">
                        Riwayat Servis
                    </h3>
                    @if ($technician->services->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th
                                        class="px-4 py-2 text-left text-gray-700 font-semibold"
                                    >
                                        Kode Servis
                                    </th>
                                    <th
                                        class="px-4 py-2 text-left text-gray-700 font-semibold"
                                    >
                                        Plat Nomor
                                    </th>
                                    <th
                                        class="px-4 py-2 text-left text-gray-700 font-semibold"
                                    >
                                        Jenis Servis
                                    </th>
                                    <th
                                        class="px-4 py-2 text-left text-gray-700 font-semibold"
                                    >
                                        Tanggal
                                    </th>
                                    <th
                                        class="px-4 py-2 text-left text-gray-700 font-semibold"
                                    >
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($technician->services as $service)
                                <tr
                                    class="border-t border-gray-200 hover:bg-gray-50"
                                >
                                    <td
                                        class="px-4 py-3 font-semibold text-blue-600"
                                    >
                                        {{ $service->service_code }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $service->vehicle->plate_number }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $service->service_type }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ \Carbon\Carbon::parse($service->service_date)->format('d/m/Y') }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <span
                                            class="px-3 py-1 rounded-full text-white font-semibold text-sm @if ($service->status === 'pending') bg-yellow-500 @elseif ($service->status === 'done') bg-green-500 @elseif ($service->status === 'cancelled') bg-red-500 @else bg-gray-500 @endif"
                                        >
                                            {{ ucfirst($service->status) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p class="text-gray-500">Tidak ada riwayat servis</p>
                    @endif
                </div>

                <div class="mt-6 flex gap-2">
                    <a
                        href="{{ route('technicians.edit', $technician) }}"
                        class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-6 rounded"
                    >
                        Edit
                    </a>
                    <form
                        action="{{ route('technicians.destroy', $technician) }}"
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
