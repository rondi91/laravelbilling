<?php

namespace App\Http\Controllers;

use App\Models\PaketInternet;
use App\Http\Requests\StorePaketInternetRequest;
use App\Http\Requests\UpdatePaketInternetRequest;

class PaketInternetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paketInternets = PaketInternet::all();
        return view('paket_internets.index', compact('paketInternets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paket_internets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaketInternetRequest $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'kecepatan' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        PaketInternet::create($request->all());
        return redirect()->route('paket_internets.index')
                         ->with('success', 'Paket Internet created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaketInternet $paketInternet)
    {
        // return view('paket_internets.show', compact('paketInternet'));
        $pelanggans = $paketInternet->pelanggans;
        return view('paket_internets.show', compact('paketInternet', 'pelanggans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaketInternet $paketInternet)
    {
        return view('paket_internets.edit', compact('paketInternet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaketInternetRequest $request, PaketInternet $paketInternet)
    {
        $request->validate([
            'nama_paket' => 'required',
            'kecepatan' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $paketInternet->update($request->all());
        return redirect()->route('paket_internets.index')
                         ->with('success', 'Paket Internet updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaketInternet $paketInternet)
    {
        $paketInternet->delete();
        return redirect()->route('paket_internets.index')
                         ->with('success', 'Paket Internet deleted successfully.');
    }
}
