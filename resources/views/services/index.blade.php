@extends('layouts.app') @section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        Daftar Servis
                    </h2>
                    <a
                        href="{{ route('services.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    >
                        + Tambah Servis
                    </a>
                </div>

                @if ($message = Session::get('success'))
                <div
                    class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded"
                >
                    {{ $message }}
                </div>
                @endif

                <div class="overflow-x-auto">
                    <table
                        class="w-full border-collapse border border-gray-300"
                    >
                        <thead class="bg-gray-100">
                            <tr>
                                <th
                                    class="border border-gray-300 px-4 py-2 text-left font-semibold"
                                >
                                    Kode Servis
                                </th>
                                <th
                                    class="border border-gray-300 px-4 py-2 text-left font-semibold"
                                >
                                    Pelanggan
                                </th>
                                <th
                                    class="border border-gray-300 px-4 py-2 text-left font-semibold"
                                >
                                    Plat Kendaraan
                                </th>
                                <th
                                    class="border border-gray-300 px-4 py-2 text-left font-semibold"
                                >
                                    Teknisi
                                </th>
                                <th
                                    class="border border-gray-300 px-4 py-2 text-left font-semibold"
                                >
                                    Tanggal Servis
                                </th>
                                <th
                                    class="border border-gray-300 px-4 py-2 text-left font-semibold"
                                >
                                    Status
                                </th>
                                <th
                                    class="border border-gray-300 px-4 py-2 text-center font-semibold"
                                >
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($services as $service)
                            <tr class="hover:bg-gray-50">
                                <td
                                    class="border border-gray-300 px-4 py-2 font-semibold text-blue-600"
                                >
                                    {{ $service->service_code }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $service->vehicle->customer->name }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $service->vehicle->plate_number }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $service->technician->name }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ \Carbon\Carbon::parse($service->service_date)->format('d/m/Y') }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span
                                        class="px-3 py-1 rounded-full text-white text-sm font-semibold @if ($service->status === 'pending') bg-yellow-500 @elseif ($service->status === 'completed') bg-green-500 @elseif ($service->status === 'cancelled') bg-red-500 @else bg-gray-500 @endif"
                                    >
                                        {{ ucfirst($service->status) }}
                                    </span>
                                </td>
                                <td
                                    class="border border-gray-300 px-4 py-2 text-center"
                                >
                                    <a
                                        href="{{
                                            route('services.show', $service)
                                        }}"
                                        class="text-blue-600 hover:underline text-sm mr-2"
                                        >Lihat</a
                                    >
                                    @if ($service->status !== 'completed')
                                    <form
                                        action="{{
                                            route('services.update', $service)
                                        }}"
                                        method="POST"
                                        class="inline"
                                    >
                                        @csrf @method('PUT')
                                        <input
                                            type="hidden"
                                            name="status"
                                            value="completed"
                                        />
                                        <button
                                            type="submit"
                                            class="text-green-600 hover:underline text-sm mr-2"
                                            onclick="return confirm('Selesaikan servis ini?')"
                                        >
                                            Selesaikan
                                        </button>
                                    </form>
                                    @endif
                                    <a
                                        href="{{
                                            route('services.edit', $service)
                                        }}"
                                        class="text-orange-600 hover:underline text-sm mr-2"
                                        >Edit</a
                                    >
                                    <form
                                        action="{{
                                            route('services.destroy', $service)
                                        }}"
                                        method="POST"
                                        class="inline"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="text-red-600 hover:underline text-sm"
                                            onclick="return confirm('Hapus servis ini?')"
                                        >
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td
                                    colspan="7"
                                    class="border border-gray-300 px-4 py-2 text-center text-gray-500"
                                >
                                    Tidak ada data servis
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $services->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
