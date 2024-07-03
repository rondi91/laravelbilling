<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPerubahanPaket;
use App\Http\Requests\StoreRiwayatPerubahanPaketRequest;
use App\Http\Requests\UpdateRiwayatPerubahanPaketRequest;
use App\Models\PaketInternet;
use App\Models\pelanggan;

class RiwayatPerubahanPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riwayats = RiwayatPerubahanPaket::with(['pelanggan', 'paketSebelum', 'paketSesudah'])->get();
        return view('riwayat_perubahan_pakets.index', compact('riwayats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggans = Pelanggan::all();
        $pakets = PaketInternet::all();
        return view('riwayat_perubahan_pakets.create', compact('pelanggans', 'pakets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRiwayatPerubahanPaketRequest $request)
    {
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'id_paket_sebelum' => 'required|exists:paket_internets,id_paket',
            'id_paket_sesudah' => 'required|exists:paket_internets,id_paket',
            'tanggal_perubahan' => 'required|date',
        ]);

        RiwayatPerubahanPaket::create($request->all());
        return redirect()->route('riwayat-perubahan-pakets.index')
                         ->with('success', 'Riwayat Perubahan Paket created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(RiwayatPerubahanPaket $riwayatPerubahanPaket)
    {
        return view('riwayat_perubahan_pakets.show', compact('riwayatPerubahanPaket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RiwayatPerubahanPaket $riwayatPerubahanPaket)
    {
        $pelanggans = pelanggan::all();
        $pakets = PaketInternet::all();
        return view('riwayat_perubahan_pakets.edit', compact('riwayatPerubahanPaket', 'pelanggans', 'pakets'));
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRiwayatPerubahanPaketRequest $request, RiwayatPerubahanPaket $riwayatPerubahanPaket)
    {
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'id_paket_sebelum' => 'required|exists:paket_internets,id_paket',
            'id_paket_sesudah' => 'required|exists:paket_internets,id_paket',
            'tanggal_perubahan' => 'required|date',
        ]);

        $riwayatPerubahanPaket->update($request->all());
        return redirect()->route('riwayat-perubahan-pakets.index')
                         ->with('success', 'Riwayat Perubahan Paket updated successfully.');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RiwayatPerubahanPaket $riwayatPerubahanPaket)
    {
        $riwayatPerubahanPaket->delete();
        return redirect()->route('riwayat-perubahan-pakets.index')
                         ->with('success', 'Riwayat Perubahan Paket deleted successfully.');
   
    }
}
