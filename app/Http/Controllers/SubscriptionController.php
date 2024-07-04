<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\PaketInternet;
use App\Models\pelanggan;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = Subscription::with(['pelanggan', 'paket'])->get();
        return view('subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggans = Pelanggan::all();
        $pakets = PaketInternet::all();
        return view('subscriptions.create', compact('pelanggans', 'pakets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubscriptionRequest $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,pelanggan_id',
            'paket_id' => 'required|exists:paket_internets,paket_id',
            'tanggal_mulai' => 'required|date'
        ]);

        Subscription::create($request->all());

        return redirect()->route('subscriptions.index')
                         ->with('success', 'Subscription created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription)
    {
        return view('subscriptions.show', compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        $pelanggans = pelanggan::all();
        $pakets = PaketInternet::all();
        return view('subscriptions.edit', compact('subscription', 'pelanggans', 'pakets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id_pelanggan',
            'paket_id' => 'required|exists:paket_internets,paket_id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
        ]);

        $subscription->update($request->all());
        return redirect()->route('subscriptions.index')
                         ->with('success', 'Subscription updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->route('subscriptions.index')
                         ->with('success', 'Subscription deleted successfully.');
    }
}
