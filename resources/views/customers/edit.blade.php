@extends('layouts.app') @section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    Edit Pelanggan
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
                    action="{{ route('customers.update', $customer) }}"
                    method="POST"
                >
                    @csrf @method('PUT')

                    <div class="mb-6">
                        <label
                            for="name"
                            class="block text-gray-700 font-semibold mb-2"
                            >Nama Pelanggan</label
                        >
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            value="{{ old('name', $customer->name) }}"
                            required
                        />
                        @error('name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label
                            for="phone"
                            class="block text-gray-700 font-semibold mb-2"
                            >No Telepon</label
                        >
                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            value="{{ old('phone', $customer->phone) }}"
                            required
                        />
                        @error('phone')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label
                            for="address"
                            class="block text-gray-700 font-semibold mb-2"
                            >Alamat</label
                        >
                        <textarea
                            id="address"
                            name="address"
                            rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                            required
                            >{{ old('address', $customer->address) }}</textarea
                        >
                        @error('address')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex gap-2">
                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded"
                        >
                            Perbarui
                        </button>
                        <a
                            href="{{ route('customers.index') }}"
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
