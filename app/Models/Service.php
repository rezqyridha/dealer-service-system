<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_code',
        'vehicle_id',
        'technician_id',
        'service_date',
        'service_type',
        'status',
        'created_by'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
