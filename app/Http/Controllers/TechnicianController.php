<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use App\Http\Requests\StoreTechnicianRequest;
use App\Http\Requests\UpdateTechnicianRequest;

class TechnicianController extends Controller
{
    public function index()
    {
        $technicians = Technician::latest()->paginate(10);
        return view('technicians.index', compact('technicians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnicianRequest $request)
    {
        Technician::create($request->validated());
        return redirect()->route('technicians.index')
            ->with('success', 'Teknisi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnicianRequest $request, Technician $technician)
    {
        $technician->update($request->validated());
        return redirect()->route('technicians.index')
            ->with('success', 'Teknisi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technician $technician)
    {
        $technician->delete();
        return redirect()->route('technicians.index')
            ->with('success', 'Teknisi berhasil dihapus');
    }
}
