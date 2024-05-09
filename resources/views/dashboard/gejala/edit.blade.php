@extends('dashboard.layouts.main')

@section('content')

    <div class="container container-p-y">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">Edit Data Gejala</h5>
                    <div class="card-body">
                        <form action="/dashboard/gejala/{{ $gejala->kode_gejala }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="kode_gejala" class="form-label">Kode Gejala</label>
                                <input type="text" class="form-control @error('kode_gejala') is-invalid @enderror" id="kode_gejala" name="kode_gejala" placeholder="Kode Gejala" value="{{ $gejala->kode_gejala }}" required autocomplete="off" readonly/>
                                @error('kode_gejala')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama_gejala" class="form-label">Nama Gejala</label>
                                <input type="text" class="form-control @error('nama_gejala') is-invalid @enderror" id="nama_gejala" name="nama_gejala" placeholder="Nama Gejala" value="{{ old('nama_gejala', $gejala->nama_gejala) }}" required autocomplete="off"/>
                                @error('nama_gejala')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                                <textarea class="form-control @error('pertanyaan') is-invalid @enderror" id="pertanyaan" name="pertanyaan" rows="3" placeholder="Pertanyaan" required>{{ old('pertanyaan', $gejala->pertanyaan) }}</textarea>
                                @error('pertanyaan')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/dashboard/gejala" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection