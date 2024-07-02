<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Http\Requests\StorepelangganRequest;
use App\Http\Requests\UpdatepelangganRequest;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return view('pelanggans.index', compact('pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepelangganRequest $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|email|unique:pelanggans,email',
        ]);

        Pelanggan::create($request->all());
        return redirect()->route('pelanggans.index')
                         ->with('success', 'Pelanggan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(pelanggan $pelanggan)
    {
        return view('pelanggans.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelanggan $pelanggan)
    {
        return view('pelanggans.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepelangganRequest $request, pelanggan $pelanggan)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|email|unique:pelanggans,email,' . $pelanggan->id_pelanggan,
        ]);

        $pelanggan->update($request->all());
        return redirect()->route('pelanggans.index')
                         ->with('success', 'Pelanggan updated successfully.');
    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggans.index')
                         ->with('success', 'Pelanggan deleted successfully.');
    }
}
