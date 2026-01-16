@extends('layouts.app') @section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-6">
            <h2
                class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                {{ __("Dashboard") }}
            </h2>
        </div>

        <!-- Statistik Hari Ini -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card Total Servis Hari Ini -->
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg hover:shadow-xl transition-shadow duration-300"
            >
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p
                                class="text-gray-600 dark:text-gray-400 text-sm font-medium"
                            >
                                Servis Hari Ini
                            </p>
                            <p
                                class="text-4xl font-bold text-gray-900 dark:text-white mt-2"
                            >
                                {{ $totalToday }}
                            </p>
                        </div>
                        <div
                            class="bg-blue-100 dark:bg-blue-900 p-4 rounded-full"
                        >
                            <svg
                                class="w-8 h-8 text-blue-600 dark:text-blue-300"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"
                                ></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Servis Selesai -->
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg hover:shadow-xl transition-shadow duration-300"
            >
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p
                                class="text-gray-600 dark:text-gray-400 text-sm font-medium"
                            >
                                Servis Selesai
                            </p>
                            <p
                                class="text-4xl font-bold text-gray-900 dark:text-white mt-2"
                            >
                                {{ $doneToday }}
                            </p>
                        </div>
                        <div
                            class="bg-green-100 dark:bg-green-900 p-4 rounded-full"
                        >
                            <svg
                                class="w-8 h-8 text-green-600 dark:text-green-300"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Servis Pending -->
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg hover:shadow-xl transition-shadow duration-300"
            >
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p
                                class="text-gray-600 dark:text-gray-400 text-sm font-medium"
                            >
                                Servis Pending
                            </p>
                            <p
                                class="text-4xl font-bold text-gray-900 dark:text-white mt-2"
                            >
                                {{ $pendingToday }}
                            </p>
                        </div>
                        <div
                            class="bg-yellow-100 dark:bg-yellow-900 p-4 rounded-full"
                        >
                            <svg
                                class="w-8 h-8 text-yellow-600 dark:text-yellow-300"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
