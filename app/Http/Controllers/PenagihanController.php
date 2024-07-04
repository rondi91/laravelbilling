<?php

namespace App\Http\Controllers;

use App\Models\Penagihan;
use App\Http\Requests\StorePenagihanRequest;
use App\Http\Requests\UpdatePenagihanRequest;
use App\Models\pelanggan;
use App\Models\Subscription;

class PenagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penagihans = Penagihan::with('pelanggan')->get();
        return view('penagihans.index', compact('penagihans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggans = Pelanggan::all();
        return view('penagihans.create', compact('pelanggans'));

        // $subscriptions = Subscription::with('paket', 'pelanggan')->get();
        // return view('penagihans.create', compact('subscriptions'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenagihanRequest $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'tanggal_penagihan' => 'required|date',
            // 'jumlah' => 'required|numeric',
            // 'status' => 'required|boolean',
          
        ]);

        Penagihan::create($request->all());
        return redirect()->route('penagihans.index')
                         ->with('success', 'Penagihan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penagihan $penagihan)
    {
        return view('penagihans.show', compact('penagihan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penagihan $penagihan)
    {
        $pelanggans = pelanggan::all();
        return view('penagihans.edit', compact('penagihan', 'pelanggans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenagihanRequest $request, Penagihan $penagihan)
    {
        $request->validate([
            'id' => 'required|exists:pelanggans,pelanggan_id',
            'tanggal_penagihan' => 'required|date',
            'jumlah' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $penagihan->update($request->all());
        return redirect()->route('penagihans.index')
                         ->with('success', 'Penagihan updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penagihan $penagihan)
    {
        $penagihan->delete();
        return redirect()->route('penagihans.index')
                         ->with('success', 'Penagihan deleted successfully.');
    }
}
