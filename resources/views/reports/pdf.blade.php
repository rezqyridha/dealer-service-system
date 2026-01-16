<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Laporan Servis</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
                color: #333;
                line-height: 1.6;
            }
            .container {
                max-width: 1000px;
                margin: 0 auto;
                padding: 20px;
            }
            .header {
                text-align: center;
                margin-bottom: 30px;
                border-bottom: 3px solid #333;
                padding-bottom: 15px;
            }
            .header h1 {
                font-size: 24px;
                margin-bottom: 5px;
                color: #000;
            }
            .header p {
                font-size: 11px;
                color: #666;
            }
            .info-section {
                margin-bottom: 20px;
                display: flex;
                justify-content: space-between;
                font-size: 11px;
            }
            .info-item {
                flex: 1;
            }
            .info-label {
                font-weight: bold;
                color: #333;
            }
            .stats-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 15px;
                margin-bottom: 25px;
            }
            .stat-box {
                border: 1px solid #ddd;
                padding: 12px;
                text-align: center;
                background-color: #f9f9f9;
            }
            .stat-box .value {
                font-size: 28px;
                font-weight: bold;
                color: #0066cc;
                margin: 5px 0;
            }
            .stat-box .label {
                font-size: 11px;
                color: #666;
                font-weight: bold;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
            }
            table th {
                background-color: #2c3e50;
                color: white;
                padding: 10px;
                text-align: left;
                font-weight: bold;
                font-size: 11px;
                border: 1px solid #333;
            }
            table td {
                padding: 8px 10px;
                border: 1px solid #ddd;
                font-size: 11px;
            }
            table tr:nth-child(even) {
                background-color: #f9f9f9;
            }
            .status-done {
                background-color: #d4edda;
                color: #155724;
                padding: 2px 6px;
                border-radius: 3px;
                font-weight: bold;
            }
            .status-pending {
                background-color: #fff3cd;
                color: #856404;
                padding: 2px 6px;
                border-radius: 3px;
                font-weight: bold;
            }
            .footer {
                margin-top: 30px;
                padding-top: 15px;
                border-top: 1px solid #ddd;
                text-align: right;
                font-size: 10px;
                color: #666;
            }
            .page-break {
                page-break-after: always;
            }
            .code-cell {
                font-family: "Courier New", monospace;
                font-weight: bold;
                color: #0066cc;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- Header -->
            <div class="header">
                <h1>LAPORAN SERVIS KENDARAAN</h1>
                <p>Dealer Service Management System</p>
                <p style="margin-top: 10px; font-size: 10px">
                    @if($startDate && $endDate) Periode:
                    {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }} -
                    {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}
                    @else Periode: Semua Data @endif
                </p>
            </div>

            <!-- Statistics -->
            <div class="stats-grid">
                <div class="stat-box">
                    <div class="label">Total Servis</div>
                    <div class="value">{{ $totalServices }}</div>
                </div>
                <div class="stat-box">
                    <div class="label">Selesai</div>
                    <div class="value" style="color: #28a745">
                        {{ $completedServices }}
                    </div>
                </div>
                <div class="stat-box">
                    <div class="label">Pending</div>
                    <div class="value" style="color: #ffc107">
                        {{ $pendingServices }}
                    </div>
                </div>
            </div>

            <!-- Info -->
            <div class="info-section">
                <div class="info-item">
                    <span class="info-label">Tanggal Laporan:</span>
                    {{ now()->format('d/m/Y H:i:s') }}
                </div>
                <div class="info-item" style="text-align: right">
                    <span class="info-label">Halaman:</span> 1
                </div>
            </div>

            <!-- Services Table -->
            <table>
                <thead>
                    <tr>
                        <th style="width: 12%">Kode Servis</th>
                        <th style="width: 15%">Pelanggan</th>
                        <th style="width: 12%">Kendaraan</th>
                        <th style="width: 13%">Teknisi</th>
                        <th style="width: 12%">Jenis Servis</th>
                        <th style="width: 10%">Tanggal</th>
                        <th style="width: 10%">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                    <tr>
                        <td class="code-cell">{{ $service->service_code }}</td>
                        <td>
                            {{ $service->vehicle->customer->name ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $service->vehicle->plate_number
                            }}<br /><small
                                >{{ $service->vehicle->model }}</small
                            >
                        </td>
                        <td>{{ $service->technician->name ?? 'N/A' }}</td>
                        <td>{{ ucfirst($service->service_type) }}</td>
                        <td>{{ $service->service_date->format('d/m/Y') }}</td>
                        <td>
                            @if($service->status === 'done')
                            <span class="status-done">✓ Selesai</span>
                            @else
                            <span class="status-pending">⏳ Pending</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td
                            colspan="7"
                            style="text-align: center; padding: 20px"
                        >
                            Tidak ada data servis
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Footer -->
            <div class="footer">
                <p>
                    Laporan ini dihasilkan oleh Dealer Service Management System
                </p>
                <p>© {{ date("Y") }} - Confidential</p>
            </div>
        </div>
    </body>
</html>
