<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.gejala.index', [
            'data_gejala' => Gejala::all() 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastNumberData = Gejala::orderBy('id', 'desc')->first();
        $lastNumber = $lastNumberData ? (int)explode("G", $lastNumberData->kode_gejala)[1] : 0;
        $newCode = 'G' . ($lastNumber + 1);

        return view('dashboard.gejala.create', compact('newCode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_gejala' => 'required',
            'nama_gejala' => 'required|max:255',
            'pertanyaan' => 'required'
        ]);

        $lastNumberData = Gejala::orderBy('id', 'desc')->first();
        $lastNumber = $lastNumberData ? (int)explode("G", $lastNumberData->kode_gejala)[1] : 0;
        $newCode = 'G' . ($lastNumber + 1);

        if ($validatedData['kode_gejala'] != $newCode) {
            return redirect()->back()->withInput()->with('failed', 'Dilarang merubah kode gejala!');
        }

        $validatedData['uuid'] = Str::uuid()->toString();

        Gejala::create($validatedData);
        
        return Redirect::route('gejala.index')->with('success', 'Data gejala berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Gejala $gejala)
    // {
        
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gejala $gejala)
    {
        return view('dashboard.gejala.edit', compact('gejala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gejala $gejala)
    {
        $validatedData = $request->validate([
            'nama_gejala' => 'required|max:255',
            'pertanyaan' => 'required'
        ]);

        Gejala::where('id', $gejala->id)->update($validatedData);
        
        return Redirect::route('gejala.index')->with('success', "Data gejala: $gejala->kode_gejala berhasil diupate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gejala $gejala)
    {
        Aturan::where('gejala_id', $gejala->id)->delete();
        Aturan::where('gejala_sebelum', $gejala->kode_gejala)->delete();
        Aturan::where('next_true', $gejala->kode_gejala)->delete();
        Aturan::where('next_false', $gejala->kode_gejala)->delete();
        // Kerusakan::where('gejala', 'like', "%$gejala->kode_gejala%")->delete();
        Gejala::destroy($gejala->id);
        
        return Redirect::route('gejala.index')->with('success', "Data gejala: $gejala->kode_gejala berhasil dihapus");
    }
}
