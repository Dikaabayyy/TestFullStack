<?php

namespace App\Http\Controllers;

use App\Models\Residents;
use App\Models\Payments;
use App\Models\Houses;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ResidentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resident = Residents::get();
        return view('components.residents.index', compact('resident'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $houses = Houses::where('resident_status', 'Tidak Berpenghuni')->get();
        return view('components.residents.addresidents', compact('houses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^08[0-9]{8,12}$/'],
            'gender' => 'required',
            'resident_status' => 'required',
            'married' => 'required',
            'resident_house' =>'required'
        ]);

        $houses = Houses::where('slug', $request['resident_house'])->firstOrFail();

        Residents::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'resident_status' => $request->resident_status,
            'married' => $request->married,
            'houses_id' => $houses['id'],
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('residents')->with('success', 'Data penghuni berhasil ditambahkan!');
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
        $residents = Residents::where('slug', $slug)->firstOrFail();

        $houses = Houses::where('resident_status', 'Tidak Berpenghuni')->get();

        return view('components.residents.editresidents', compact('residents', 'houses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $residents = Residents::where('slug', $slug)->firstOrFail();
        $houses = Houses::where('slug', $request['resident_house'])->firstOrFail();

        $validateResidents = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'resident_status' => 'required',
            'phone' => 'required',
            'married' => 'required',
        ]);

        $validateResidents['houses_id'] = $houses['id'];

        $imagePath = $residents['img_name'];

        if ($request['image']) {

            if (Storage::disk('public')->exists($imagePath)) {

                $path = 'images/profile/'.$residents['slug'];

                Storage::disk('public')->deleteDirectory($path);

                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $pathImage = $image->storeAs('images/profile/'.$residents['slug'], $name, 'public');

                $residents['img_name'] = $pathImage;
                $residents->update($validateResidents );

                $houses->update([
                    'resident_status' => 'Berpenghuni',
                ]);

                return redirect()->route('residents')->with('success', 'Data penghuni berhasil diperbarui.');
            }
        } else {
            $residents->update($validateResidents );

            $houses->update([
                'resident_status' => 'Berpenghuni',
            ]);

            return redirect()->route('residents')->with('success', 'Data penghuni berhasil diperbarui.');
        }

        return back()->with('error', 'Gambar tidak ditemukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $resident = Residents::where('slug', $slug)->firstOrFail();
        $houses = Houses::where('id', $resident['houses_id'])->firstOrFail();

        $resident->delete();

        $houses->update([
            'resident_status' => 'Tidak Berpenghuni',
        ]);

        return redirect()->route('residents')->with('success', 'Data penghuni berhasil dihapus!');
    }
}
