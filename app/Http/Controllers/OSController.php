<?php

namespace App\Http\Controllers;

use App\Models\OS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class OSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.os.index', [
            'data_os' => OS::all() 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required'
        ]);

        $validatedData['uuid'] = Str::uuid()->toString();

        OS::create($validatedData);
        
        return Redirect::route('os.index')->with('success', 'Data OS berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OS $os)
    {
        $validatedData = $request->validate([
            'nama' => 'required'
        ]);

        OS::where('id', $os->id)->update($validatedData);
        
        return Redirect::route('os.index')->with('success', "Data OS: $os->nama berhasil diupate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OS $os)
    {
        OS::destroy($os->id);
        
        return Redirect::route('os.index')->with('success', "Data OS: $os->nama berhasil dihapus");
    }
}
