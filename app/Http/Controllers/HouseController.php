<?php

namespace App\Http\Controllers;

use App\Models\Residents;
use App\Models\Payments;
use App\Models\Houses;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $houses = Houses::get();
        return view('components.house.index', compact('houses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.house.addhouse');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        Houses::create([
            'name' => $request->name,
            'address' => $request->address,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('house')->with('success', 'Data rumah berhasil ditambahkan!');
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
        $house = Houses::where('slug', $slug)->firstOrFail();

        $resident = Residents::where('houses_id', $house->id)->first();

        $house->resident_name = $resident ? $resident->name : 'Tidak ada penghuni';

        return view('components.house.edithouse', compact('house'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $house = Houses::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'resident_status' => 'required',
            'payment_term' => 'required',
        ]);

        if ($request['resident_history'] == 'Belum Berpenghuni') {
            $request['resident_history'] = 'Belum Berpenghuni';
        } else{

        }

        $house->update([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'resident_status' => $validated['resident_status'],
            'payment_term' => $validated['payment_term'],
            'slug' => Str::slug($validated['name']),
            'resident_history' => $request['resident_history']
        ]);

        return redirect()->route('house')->with('success', 'Data rumah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $house = Houses::where('slug', $slug)->firstOrFail();
        $house->delete();

        return redirect()->route('houses')->with('success', 'Data rumah berhasil dihapus!');
    }
}
