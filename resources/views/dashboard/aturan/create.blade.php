@extends('dashboard.layouts.main')

@section('content')

    <div class="container container-p-y pt-2">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">Tambah Data Aturan</h5>
                    <div class="card-body">
                        <form action="/dashboard/aturan" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="kode_aturan" class="form-label">Kode Aturan</label>
                                <input type="text" class="form-control @error('kode_aturan') is-invalid @enderror" id="kode_aturan" name="kode_aturan" placeholder="Kode Aturan" value="{{ $newCode }}" required autocomplete="off" readonly/>
                                @error('kode_aturan')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gejala_id" class="form-label">Gejala</label>
                                <select name="gejala_id" id="gejala_id" class="form-select">
                                    @foreach ($data_gejala as $gejala)
                                        <option value="{{ $gejala->id }}" {{ old('gejala_id') == $gejala->id ? 'selected' : '' }}>{{ $gejala->kode_gejala }} - {{ $gejala->nama_gejala }}</option>
                                    @endforeach
                                </select>
                                @error('gejala_id')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gejala_sebelum" class="form-label">Gejala Sebelumnya</label>
                                <select name="gejala_sebelum" id="gejala_sebelum" class="form-select">
                                    <option value="">Tidak ada gejala sebelumnya</option>
                                    @foreach ($data_gejala as $gejala)
                                        <option value="{{ $gejala->kode_gejala }}" {{ old('gejala_sebelum') == $gejala->kode_gejala ? 'selected' : '' }}>{{ $gejala->kode_gejala }} - {{ $gejala->nama_gejala }}</option>
                                    @endforeach
                                </select>
                                @error('gejala_sebelum')
                                    <div class="invalid-feedback text-start">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="next_true" class="form-label">Jika Iya</label>
                                    <select name="next_true" id="next_true" class="form-select">
                                        <option value="">Tidak ada tindakan selanjutnya</option>
                                        @foreach ($data_gejala as $gejala)
                                            <option value="{{ $gejala->kode_gejala }}" {{ old('next_true') == $gejala->kode_gejala ? 'selected' : '' }}>{{ $gejala->kode_gejala }}</option>
                                        @endforeach
                                        @foreach ($data_kerusakan as $kerusakan)
                                            <option value="{{ $kerusakan->kode_kerusakan }}" {{ old('next_true') == $kerusakan->kode_kerusakan ? 'selected' : '' }}>{{ $kerusakan->kode_kerusakan }}</option>
                                        @endforeach
                                    </select>
                                    @error('next_true')
                                        <div class="invalid-feedback text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="next_false" class="form-label">Jika Tidak</label>
                                    <select name="next_false" id="next_false" class="form-select">
                                        <option value="">Tidak ada tindakan selanjutnya</option>
                                        @foreach ($data_gejala as $gejala)
                                            <option value="{{ $gejala->kode_gejala }}" {{ old('next_false') == $gejala->kode_gejala ? 'selected' : '' }}>{{ $gejala->kode_gejala }}</option>
                                        @endforeach
                                        @foreach ($data_kerusakan as $kerusakan)
                                            <option value="{{ $kerusakan->kode_kerusakan }}" {{ old('next_false') == $kerusakan->kode_kerusakan ? 'selected' : '' }}>{{ $kerusakan->kode_kerusakan }}</option>
                                        @endforeach
                                    </select>
                                    @error('next_false')
                                        <div class="invalid-feedback text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/dashboard/aturan" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection