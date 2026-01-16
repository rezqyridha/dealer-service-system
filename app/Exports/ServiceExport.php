<?php

namespace App\Exports;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ServiceExport implements FromQuery, WithHeadings, WithMapping
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function query()
    {
        return Service::with(['vehicle.customer', 'technician'])
            ->when($this->startDate, fn($q) => $q->whereDate('service_date', '>=', $this->startDate))
            ->when($this->endDate, fn($q) => $q->whereDate('service_date', '<=', $this->endDate))
            ->latest();
    }

    public function headings(): array
    {
        return [
            'Kode Servis',
            'Nama Pelanggan',
            'No. Plat Kendaraan',
            'Model Kendaraan',
            'Teknisi',
            'Jenis Servis',
            'Tanggal Servis',
            'Status',
            'Dibuat Pada',
        ];
    }

    public function map($service): array
    {
        return [
            $service->service_code,
            $service->vehicle->customer->name ?? 'N/A',
            $service->vehicle->plate_number,
            $service->vehicle->model,
            $service->technician->name ?? 'N/A',
            ucfirst($service->service_type),
            $service->service_date->format('d/m/Y'),
            $service->status === 'done' ? 'Selesai' : 'Pending',
            $service->created_at->format('d/m/Y H:i:s'),
        ];
    }
}
