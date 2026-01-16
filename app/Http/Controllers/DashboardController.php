<?php

namespace App\Http\Controllers;

use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();

        $totalToday = Service::whereDate('service_date', $today)->count();
        $doneToday = Service::whereDate('service_date', $today)
                            ->where('status', 'done')->count();
        $pendingToday = Service::whereDate('service_date', $today)
                               ->where('status', 'pending')->count();

        return view('dashboard', compact(
            'totalToday', 'doneToday', 'pendingToday'
        ));
    }
}
