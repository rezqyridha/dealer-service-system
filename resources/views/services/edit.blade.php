@extends('layouts.app') @section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    Edit Servis
                </h2>

                @if ($errors->any())
                <div
                    class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded"
                >
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form
                    action="{{ route('services.update', $service) }}"
                    method="POST"
                >
                    @csrf @method('PUT')

                    <div class="mb-6">
                        <label
                            for="vehicle_id"
                            class="block text-gray-700 font-semibold mb-2"
                            >Kendaraan
                            <span class="text-red-500">*</span></label
                        >
                        <select
                            name="vehicle_id"
                            id="vehicle_id"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500 @error('vehicle_id') border-red-500 @enderror"
                            required
                        >
                            <option value="">-- Pilih Kendaraan --</option>
                            @foreach ($vehicles as $vehicle)
                            <option
                                value="{{ $vehicle->id }}"
                                @selected($service-
                            >
                                vehicle_id == $vehicle->id)>
                                {{ $vehicle->customer->name }} -
                                {{ $vehicle->plate_number }}
                            </option>
                            @endforeach
                        </select>
                        @error('vehicle_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label
                            for="technician_id"
                            class="block text-gray-700 font-semibold mb-2"
                            >Teknisi <span class="text-red-500">*</span></label
                        >
                        <select
                            name="technician_id"
                            id="technician_id"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500 @error('technician_id') border-red-500 @enderror"
                            required
                        >
                            <option value="">-- Pilih Teknisi --</option>
                            @foreach ($technicians as $technician)
                            <option
                                value="{{ $technician->id }}"
                                @selected($service-
                            >
                                technician_id == $technician->id)>
                                {{ $technician->name }}
                                ({{ $technician->specialization }})
                            </option>
                            @endforeach
                        </select>
                        @error('technician_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label
                            for="service_date"
                            class="block text-gray-700 font-semibold mb-2"
                            >Tanggal Servis
                            <span class="text-red-500">*</span></label
                        >
                        <input
                            type="date"
                            name="service_date"
                            id="service_date"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500 @error('service_date') border-red-500 @enderror"
                            value="{{ $service->service_date }}"
                            required
                        />
                        @error('service_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label
                            for="service_type"
                            class="block text-gray-700 font-semibold mb-2"
                            >Jenis Servis
                            <span class="text-red-500">*</span></label
                        >
                        <input
                            type="text"
                            name="service_type"
                            id="service_type"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500 @error('service_type') border-red-500 @enderror"
                            value="{{ $service->service_type }}"
                            required
                        />
                        @error('service_type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label
                            for="status"
                            class="block text-gray-700 font-semibold mb-2"
                            >Status</label
                        >
                        <select
                            name="status"
                            id="status"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                        >
                            <option value="pending" @selected($service->
                                status == 'pending')>Pending
                            </option>
                            <option value="completed" @selected($service->
                                status == 'completed')>Completed
                            </option>
                            <option value="cancelled" @selected($service->
                                status == 'cancelled')>Cancelled
                            </option>
                        </select>
                    </div>

                    <div class="flex gap-2">
                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded"
                        >
                            Simpan Perubahan
                        </button>
                        <a
                            href="{{ route('services.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded"
                        >
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
