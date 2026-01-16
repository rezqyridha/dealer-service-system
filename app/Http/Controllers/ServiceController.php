<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Vehicle;
use App\Models\Technician;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with(['vehicle.customer', 'technician'])
            ->latest()->paginate(10);

        return view('services.index', compact('services'));
    }

    public function create()
    {
        $vehicles = Vehicle::with('customer')->get();
        $technicians = Technician::all();

        return view('services.create', compact('vehicles', 'technicians'));
    }

    public function store(StoreServiceRequest $request)
    {

        $today = now()->format('Ymd');
        $countToday = Service::whereDate('created_at', now())->count() + 1;

        $serviceCode = 'SRV-' . $today . '-' . str_pad($countToday, 3, '0', STR_PAD_LEFT);

        Service::create([
            'service_code' => $serviceCode,
            'vehicle_id' => $request->vehicle_id,
            'technician_id' => $request->technician_id,
            'service_date' => $request->service_date,
            'service_type' => $request->service_type,
            'status' => 'pending',
            'created_by' => Auth::id()
        ]);

        return redirect()->route('services.index')
            ->with('success', 'Servis berhasil ditambahkan');
    }

    public function show(Service $service)
    {
        $service->load(['vehicle.customer', 'technician']);
        return view('services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        $vehicles = Vehicle::with('customer')->get();
        $technicians = Technician::all();

        return view('services.edit', compact('service', 'vehicles', 'technicians'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->validated());

        return back()->with('success', 'Status servis diperbarui');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Servis berhasil dihapus');
    }
}
