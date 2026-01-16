@extends('layouts.app') @section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Laporan Servis</h1>
        <p class="text-gray-600 mt-2">
            Filter dan export laporan servis kendaraan
        </p>
    </div>

    <!-- Filter Form -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2"
                    >Tanggal Mulai</label
                >
                <input
                    type="date"
                    name="start_date"
                    value="{{ $startDate }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2"
                    >Tanggal Akhir</label
                >
                <input
                    type="date"
                    name="end_date"
                    value="{{ $endDate }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                />
            </div>
            <div class="flex items-end gap-2">
                <button
                    type="submit"
                    class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition"
                >
                    Filter
                </button>
                <a
                    href="{{ route('reports.index') }}"
                    class="flex-1 bg-gray-400 hover:bg-gray-500 text-white font-medium py-2 px-4 rounded-lg text-center transition"
                >
                    Reset
                </a>
            </div>
            <div class="flex items-end gap-2">
                <form
                    action="{{ route('reports.export-pdf') }}"
                    method="POST"
                    class="flex gap-2 w-full"
                >
                    @csrf
                    <input
                        type="hidden"
                        name="start_date"
                        value="{{ $startDate }}"
                    />
                    <input
                        type="hidden"
                        name="end_date"
                        value="{{ $endDate }}"
                    />
                    <button
                        type="submit"
                        class="flex-1 bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition flex items-center justify-center gap-2"
                    >
                        <span>📄 PDF</span>
                    </button>
                </form>
                <form
                    action="{{ route('reports.export-excel') }}"
                    method="POST"
                    class="flex gap-2 w-full"
                >
                    @csrf
                    <input
                        type="hidden"
                        name="start_date"
                        value="{{ $startDate }}"
                    />
                    <input
                        type="hidden"
                        name="end_date"
                        value="{{ $endDate }}"
                    />
                    <button
                        type="submit"
                        class="flex-1 bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg transition flex items-center justify-center gap-2"
                    >
                        <span>📊 Excel</span>
                    </button>
                </form>
            </div>
        </form>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div
            class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500"
        >
            <p class="text-gray-600 text-sm font-medium">Total Servis</p>
            <p class="text-3xl font-bold text-blue-600 mt-2">
                {{ $totalServices }}
            </p>
        </div>
        <div
            class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500"
        >
            <p class="text-gray-600 text-sm font-medium">Selesai</p>
            <p class="text-3xl font-bold text-green-600 mt-2">
                {{ $completedServices }}
            </p>
        </div>
        <div
            class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500"
        >
            <p class="text-gray-600 text-sm font-medium">Pending</p>
            <p class="text-3xl font-bold text-yellow-600 mt-2">
                {{ $pendingServices }}
            </p>
        </div>
    </div>

    <!-- Top Technicians -->
    @if($topTechnicians->count() > 0)
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-xl font-bold text-gray-800 mb-4">
            🔧 Teknisi Paling Aktif
        </h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th
                            class="px-4 py-3 text-left font-semibold text-gray-700"
                        >
                            No
                        </th>
                        <th
                            class="px-4 py-3 text-left font-semibold text-gray-700"
                        >
                            Nama Teknisi
                        </th>
                        <th
                            class="px-4 py-3 text-center font-semibold text-gray-700"
                        >
                            Total Servis
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topTechnicians as $key => $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $key + 1 }}</td>
                        <td class="px-4 py-3 font-medium">
                            {{ $item->technician->name ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span
                                class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold"
                            >
                                {{ $item->total_services }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <!-- Services Table -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">📋 Detail Servis</h2>
        @if($services->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th
                            class="px-4 py-3 text-left font-semibold text-gray-700"
                        >
                            Kode Servis
                        </th>
                        <th
                            class="px-4 py-3 text-left font-semibold text-gray-700"
                        >
                            Pelanggan
                        </th>
                        <th
                            class="px-4 py-3 text-left font-semibold text-gray-700"
                        >
                            Kendaraan
                        </th>
                        <th
                            class="px-4 py-3 text-left font-semibold text-gray-700"
                        >
                            Teknisi
                        </th>
                        <th
                            class="px-4 py-3 text-left font-semibold text-gray-700"
                        >
                            Jenis Servis
                        </th>
                        <th
                            class="px-4 py-3 text-left font-semibold text-gray-700"
                        >
                            Tanggal
                        </th>
                        <th
                            class="px-4 py-3 text-center font-semibold text-gray-700"
                        >
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3 font-mono font-bold text-blue-600">
                            {{ $service->service_code }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $service->vehicle->customer->name ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $service->vehicle->plate_number }}
                            ({{ $service->vehicle->model }})
                        </td>
                        <td class="px-4 py-3">
                            {{ $service->technician->name ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-3">
                            {{ ucfirst($service->service_type) }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $service->service_date->format('d/m/Y') }}
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if($service->status === 'done')
                            <span
                                class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold"
                                >✓ Selesai</span
                            >
                            @else
                            <span
                                class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold"
                                >⏳ Pending</span
                            >
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-8">
            <p class="text-gray-500">Tidak ada data servis</p>
        </div>
        @endif
    </div>
</div>
@endsection
