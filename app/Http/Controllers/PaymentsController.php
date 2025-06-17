<?php

namespace App\Http\Controllers;

use App\Models\Residents;
use App\Models\Payments;
use App\Models\Houses;
use App\Models\PaymentHistory;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentDetail = Payments::get();
        $histories = PaymentHistory::get();

        return view('components.payments.index', compact('paymentDetail', 'histories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $houseIds = Houses::where('resident_status', 'Tidak Berpenghuni')->pluck('id');
        $residents = Residents::whereIn('houses_id', $houseIds)->get();

        return view('components.payments.addpayments', compact('residents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|string|max:255',
            'security_term' => 'required',
            'cleaning_term' => 'required',
        ]);

        $resident = Residents::where('slug', $request->slug)->firstOrFail();

        $house = Houses::where('id', $resident['id'])->firstOrFail();

        if ($request->security_term == 'Lunas') {
            if ($request->security_time == 'Tahunan') {
                $request['security_price'] = 100000 * 12;
            } elseif($request->security_time == 'Bulanan') {
                $request['security_price'] = 100000;

            }
        } elseif($request->security_term == 'Belum Lunas'){
            $request['security_time'] = 'Bulanan';
            $request['security_price'] = 100000;
        }

        if ($request->cleaning_term == 'Lunas') {
            if ($request->cleaning_time == 'Tahunan') {
                $request['cleaning_price'] = 15000 * 12;
            } elseif($request->cleaning_time == 'Bulanan') {
                $request['cleaning_price'] = 15000;

            }
        } elseif($request->cleaning_term == 'Belum Lunas'){
            $request['cleaning_time'] = 'Bulanan';
            $request['cleaning_price'] = 15000;
        }

        PaymentHistory::create([
            'residents_id' => $resident['id'],
            'security_term' => $request->security_term,
            'cleaning_term' => $request->cleaning_term,
            'security_time' => $request->security_time,
            'cleaning_time' => $request->cleaning_time,
            'security_price' => $request->security_price,
            'cleaning_price' => $request->cleaning_price,
            'slug' => $resident['slug']
        ]);

        $house->update([
            'resident_status' => 'Berpenghuni',
        ]);

        return redirect()->route('payments')->with('success', 'Data pembayaran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $payments = PaymentHistory::where('slug', $slug)->firstOrFail();

        $houseIds = Houses::where('resident_status', 'Tidak Berpenghuni')->pluck('id');
        $residents = Residents::whereIn('houses_id', $houseIds)->get();

        return view('components.payments.editpayments', compact('residents', 'payments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $payments = PaymentHistory::where('slug', $slug)->firstOrFail();

        $resident = Residents::where('slug', $request->slug)->firstOrFail();

        $house = Houses::where('id', $resident['id'])->firstOrFail();

        if ($request->security_term == 'Lunas') {
            if ($request->security_time == 'Tahunan') {
                $request['security_price'] = 100000 * 12;
            } elseif($request->security_time == 'Bulanan') {
                $request['security_price'] = 100000;

            }
        } elseif($request->security_term == 'Belum Lunas'){
            $request['security_time'] = 'Bulanan';
            $request['security_price'] = 100000;
        }

        if ($request->cleaning_term == 'Lunas') {
            if ($request->cleaning_time == 'Tahunan') {
                $request['cleaning_price'] = 15000 * 12;
            } elseif($request->cleaning_time == 'Bulanan') {
                $request['cleaning_price'] = 15000;

            }
        } elseif($request->cleaning_term == 'Belum Lunas'){
            $request['cleaning_time'] = 'Bulanan';
            $request['cleaning_price'] = 15000;
        }

        $payments->update([
            'residents_id' => $resident['id'],
            'security_term' => $request->security_term,
            'cleaning_term' => $request->cleaning_term,
            'security_time' => $request->security_time,
            'cleaning_time' => $request->cleaning_time,
            'security_price' => $request->security_price,
            'cleaning_price' => $request->cleaning_price,
        ]);

        $house->update([
            'resident_status' => 'Berpenghuni',
        ]);

        return redirect()->route('payments')->with('success', 'Data pembayaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $payments = PaymentHistory::where('slug', $slug)->firstOrFail();

        $resident = Residents::where('slug', $slug)->firstOrFail();
        $house = Houses::where('id', $resident['id'])->firstOrFail();

        $house->update([
            'resident_status' => 'Tidak Berpenghuni',
        ]);

        $payments->delete();

        return redirect()->route('payments')->with('success', 'Data pembayaran berhasil dihapus!');
    }
}
