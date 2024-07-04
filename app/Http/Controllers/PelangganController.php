<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Http\Requests\StorepelangganRequest;
use App\Http\Requests\UpdatepelangganRequest;
use App\Models\PaketInternet;
use App\Models\Subscription;

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
        $pakets = PaketInternet::all();
        return view('pelanggans.create', compact('pakets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepelangganRequest $request)
    {
        // dd($request);
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'email' => 'required|email|unique:pelanggans,email',
            'paket_id' => 'required|exists:paket_internets,id',
            'tanggal_mulai' => 'required|date'
        ]);
        // dd($request->no_telepon);

        $pelanggan = Pelanggan::create($request->only(['nama', 'alamat', 'no_telepon', 'email']));
        
        Subscription::create([
            'pelanggan_id' => $pelanggan->id,
            'paket_id' => $request->paket_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_mulai,
            'status' => "active"
        ]);

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
            'no_telepon' => 'required',
            'email' => 'required|email|unique:pelanggans,email,' . $pelanggan->id,
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
