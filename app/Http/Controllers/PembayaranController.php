<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Models\Penagihan;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayarans = Pembayaran::with('penagihan')->get();
        return view('pembayarans.index', compact('pembayarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penagihans = Penagihan::all();
        return view('pembayarans.create', compact('penagihans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembayaranRequest $request)
    {
        $request->validate([
            'id_penagihan' => 'required|exists:penagihans,id_penagihan',
            'tanggal_pembayaran' => 'required|date',
            'jumlah' => 'required|numeric',
        ]);

        Pembayaran::create($request->all());
        return redirect()->route('pembayarans.index')
                         ->with('success', 'Pembayaran created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        return view('pembayarans.show', compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        $penagihans = Penagihan::all();
        return view('pembayarans.edit', compact('pembayaran', 'penagihans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'id_penagihan' => 'required|exists:penagihans,id_penagihan',
            'tanggal_pembayaran' => 'required|date',
            'jumlah' => 'required|numeric',
        ]);

        $pembayaran->update($request->all());
        return redirect()->route('pembayarans.index')
                         ->with('success', 'Pembayaran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayarans.index')
                         ->with('success', 'Pembayaran deleted successfully.');
    }
}
