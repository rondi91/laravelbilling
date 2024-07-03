<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Models\Penagihan;
use Illuminate\Support\Facades\Validator;

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
        // dd($request);
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:penagihans,penagihan_id',
            'jumlah' => 'required|numeric|min:0',
            'tanggal_pembayaran' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pembayarans.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            Pembayaran::create($request->all());
            return redirect()->route('pembayarans.index')
                             ->with('success', 'Pembayaran created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('pembayarans.create')
                             ->with('error', 'Failed to create Pembayaran: ' . $e->getMessage())
                             ->withInput();
        }
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
        $validator = Validator::make($request->all(), [
            'penagihan_id' => 'required|exists:penagihans,penagihan_id',
            'jumlah' => 'required|numeric|min:0',
            'tanggal_pembayaran' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pembayarans.edit', $pembayaran->id_pembayaran)
                             ->withErrors($validator)
                             ->withInput();
        }

        try {
            $pembayaran->update($request->all());
            return redirect()->route('pembayarans.index')
                             ->with('success', 'Pembayaran updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('pembayarans.edit', $pembayaran->id_pembayaran)
                             ->with('error', 'Failed to update Pembayaran: ' . $e->getMessage())
                             ->withInput();
        }
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
