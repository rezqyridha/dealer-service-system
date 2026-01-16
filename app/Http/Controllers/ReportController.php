<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Technician;
use App\Exports\ServiceExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $services = Service::with(['vehicle.customer', 'technician'])
            ->when($startDate, fn($q) => $q->whereDate('service_date', '>=', $startDate))
            ->when($endDate, fn($q) => $q->whereDate('service_date', '<=', $endDate))
            ->latest()
            ->get();

        $totalServices = $services->count();
        $completedServices = $services->where('status', 'done')->count();
        $pendingServices = $services->where('status', 'pending')->count();

        // Teknisi paling aktif
        $topTechnicians = Service::with('technician')
            ->when($startDate, fn($q) => $q->whereDate('service_date', '>=', $startDate))
            ->when($endDate, fn($q) => $q->whereDate('service_date', '<=', $endDate))
            ->select('technician_id')
            ->selectRaw('COUNT(*) as total_services')
            ->groupBy('technician_id')
            ->orderByDesc('total_services')
            ->limit(5)
            ->get();

        return view('reports.index', compact(
            'services',
            'startDate',
            'endDate',
            'totalServices',
            'completedServices',
            'pendingServices',
            'topTechnicians'
        ));
    }

    public function exportPdf(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $services = Service::with(['vehicle.customer', 'technician'])
            ->when($startDate, fn($q) => $q->whereDate('service_date', '>=', $startDate))
            ->when($endDate, fn($q) => $q->whereDate('service_date', '<=', $endDate))
            ->latest()
            ->get();

        $totalServices = $services->count();
        $completedServices = $services->where('status', 'done')->count();
        $pendingServices = $services->where('status', 'pending')->count();

        $filename = 'Laporan_Servis_' . now()->format('d-m-Y_H-i-s') . '.pdf';

        $pdf = Pdf::loadView('reports.pdf', compact(
            'services',
            'startDate',
            'endDate',
            'totalServices',
            'completedServices',
            'pendingServices'
        ));

        return $pdf->download($filename);
    }

    public function exportExcel(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $filename = 'Laporan_Servis_' . now()->format('d-m-Y_H-i-s') . '.xlsx';

        return Excel::download(
            new ServiceExport($startDate, $endDate),
            $filename
        );
    }
}
