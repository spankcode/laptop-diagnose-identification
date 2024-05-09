<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Aturan;
use App\Models\Kerusakan;
use App\Models\OS;
use App\Models\Konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class KonsultasiController extends Controller
{
    public function index()
    {
        return view('dashboard.konsultasi.index', [
            'data_konsultasi' => Konsultasi::latest()->get()
        ]);
    }

    public function start()
    {
        Session::forget('informasi_konsultasi');

        return view('konsultasi.index', [
            'data_os' => OS::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'os' => 'required',
        ]);

        Session::put('informasi_konsultasi', $validatedData);

        $mulaiPertanyaan = 'G1';

        $gejala = Gejala::where('kode_gejala', $mulaiPertanyaan)->first();

        $aturan = Aturan::where('gejala_id', $gejala->id)->first();

        return Redirect::route('konsultasi.question', [
            'gejala' => $aturan->gejala->kode_gejala
        ]);

        // return redirect("/konsultasi/pertanyaan/" . $aturan->gejala->kode_gejala);

    }

    public function question(Gejala $gejala)
    {
        $informasiKonsultasi = Session::get('informasi_konsultasi');
        if (!$informasiKonsultasi) {
            return redirect('/konsultasi')->with('failed', 'Silahkan isi form terlebih dahulu');
        }
        return view('konsultasi.pertanyaan', [
            'aturan' => Aturan::where('gejala_id', $gejala->id)->first()
        ]);
    }

    public function next(Request $request)
    {
        // dd(str_contains(null, 'G'));
        $validatedData = $request->validate([
            'next' => 'nullable',
        ]);

        // dd(str_contains($validatedData['next'], 'G'));

        if (str_contains($validatedData['next'], 'G')) {
            // return redirect('/konsultasi/pertanyaan/' . $validatedData['next']);
            return Redirect::route('konsultasi.question', [
                'gejala' => $validatedData['next']
            ]);
        } else {
            $informasiKonsultasi = Session::get('informasi_konsultasi');
            $kerusakan = Kerusakan::where('kode_kerusakan', $validatedData['next'])->first();

            $informasiKonsultasi['kerusakan_id'] = $kerusakan ? $kerusakan->id : null;
            $informasiKonsultasi['uuid'] = Str::uuid()->toString();

            $konsultasi = Konsultasi::create($informasiKonsultasi);

            Session::forget('informasi_konsultasi');

            // return redirect('/konsultasi/hasil/' . $konsultasi->uuid);
            return Redirect::route('konsultasi.result', [
                'konsultasi' => $konsultasi->uuid
            ]);
        }
    }

    public function result(Konsultasi $konsultasi)
    {
        if ($konsultasi->kerusakan_id) {
            $gejala = '';
            $listGejala = json_decode($konsultasi->kerusakan->gejala);
            foreach ($listGejala as $key => $value) {
                $tableGejala = Gejala::where('kode_gejala', $value)->first();
                $gejala .= "- $tableGejala->nama_gejala\n";
            }
            $kerusakan = $konsultasi->kerusakan->nama_kerusakan;
            $solusi = $konsultasi->kerusakan->solusi;
            // dd($gejala);
        } else {
            $gejala = 'Tidak dapat mendeteksi indikasi pada perangkat';
            $kerusakan = 'Tidak dapat mendeteksi kerusakan perangkat';
            $solusi = 'Hubungi pihak professional terdekat, mohon maaf atas ketidaknyamanannya :)';
        }
        return view('konsultasi.hasil', compact('konsultasi', 'gejala', 'kerusakan', 'solusi'));
    }

    public function test()
    {
        $mulaiPertanyaan = 'G2';

        $gejala = Gejala::where('kode_gejala', $mulaiPertanyaan)->first();

        $aturan = Aturan::where('gejala_id', $gejala->id)->with('gejala')->first();

        dd($aturan);
        dd($aturan->gejala);

        return redirect("/konsultasi/pertanyaan/" . $aturan->gejala->kode_gejala);
    }
}
