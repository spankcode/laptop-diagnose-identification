@extends('dashboard.layouts.main')

@section('content')

    <div class="container container-p-y">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">Tambah Data Kerusakan</h5>
                    <div class="card-body">
                        <form action="/dashboard/kerusakan" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="kode_kerusakan" class="form-label">Kode Kerusakan</label>
                                <input type="text" class="form-control @error('kode_kerusakan') is-invalid @enderror" id="kode_kerusakan" name="kode_kerusakan" placeholder="Kode Kerusakan" value="{{ $newCode }}" required autocomplete="off" readonly/>
                                @error('kode_kerusakan')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_kerusakan" class="form-label">Nama Kerusakan</label>
                                <input type="text" class="form-control @error('nama_kerusakan') is-invalid @enderror" id="nama_kerusakan" name="nama_kerusakan" placeholder="Nama kerusakan" value="{{ old('nama_kerusakan') }}" required autocomplete="off"/>
                                @error('nama_kerusakan')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <p class="form-label">Gejala</p>
                                @foreach ($data_gejala as $gejala)
                                    <div class="form-check form-check-inline mb-2">
                                        <input class="form-check-input" type="checkbox" name="gejala[{{ $loop->iteration - 1 }}]" id="{{ $gejala->id }}" value="{{ $gejala->kode_gejala }}" {{ old('gejala[' . $loop->iteration - 1 . ']') == $gejala->kode_gejala ? 'checked' : '' }}>
                                        <label class="form-check-label" for="{{ $gejala->id }}">{{ $gejala->kode_gejala }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label for="solusi" class="form-label">Solusi</label>
                                <textarea class="form-control @error('solusi') is-invalid @enderror" id="solusi" name="solusi" rows="4" placeholder="Solusi" required>{{ old('solusi') }}</textarea>
                                @error('solusi')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/dashboard/kerusakan" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection