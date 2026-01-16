@extends('layouts.app') @section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        Daftar Kendaraan
                    </h2>
                    <a
                        href="{{ route('vehicles.create') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    >
                        + Tambah Kendaraan
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
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th
                                    class="px-4 py-2 text-left text-gray-700 font-semibold"
                                >
                                    No
                                </th>
                                <th
                                    class="px-4 py-2 text-left text-gray-700 font-semibold"
                                >
                                    Plat Nomor
                                </th>
                                <th
                                    class="px-4 py-2 text-left text-gray-700 font-semibold"
                                >
                                    Model
                                </th>
                                <th
                                    class="px-4 py-2 text-left text-gray-700 font-semibold"
                                >
                                    Tahun
                                </th>
                                <th
                                    class="px-4 py-2 text-left text-gray-700 font-semibold"
                                >
                                    Pelanggan
                                </th>
                                <th
                                    class="px-4 py-2 text-center text-gray-700 font-semibold"
                                >
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($vehicles as $index => $vehicle)
                            <tr
                                class="border-t border-gray-200 hover:bg-gray-50"
                            >
                                <td class="px-4 py-3">
                                    {{ ($vehicles->currentPage() - 1) * $vehicles->perPage() + $index + 1 }}
                                </td>
                                <td
                                    class="px-4 py-3 font-semibold text-blue-600"
                                >
                                    {{ $vehicle->plate_number }}
                                </td>
                                <td class="px-4 py-3 text-gray-800">
                                    {{ $vehicle->model }}
                                </td>
                                <td class="px-4 py-3">{{ $vehicle->year }}</td>
                                <td class="px-4 py-3 text-gray-700">
                                    {{ $vehicle->customer->name }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <div class="flex justify-center gap-2">
                                        <a
                                            href="{{
                                                route('vehicles.show', $vehicle)
                                            }}"
                                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded text-sm"
                                        >
                                            Lihat
                                        </a>
                                        <a
                                            href="{{
                                                route('vehicles.edit', $vehicle)
                                            }}"
                                            class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-1 px-3 rounded text-sm"
                                        >
                                            Edit
                                        </a>
                                        <form
                                            action="{{
                                                route(
                                                    'vehicles.destroy',
                                                    $vehicle
                                                )
                                            }}"
                                            method="POST"
                                            class="inline"
                                            onsubmit="return confirm('Yakin ingin menghapus?')"
                                        >
                                            @csrf @method('DELETE')
                                            <button
                                                type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm"
                                            >
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td
                                    colspan="6"
                                    class="px-4 py-3 text-center text-gray-500"
                                >
                                    Tidak ada kendaraan
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $vehicles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
