@extends('layouts.main')

@section('content')

    <div class="container container-p-y mt-5">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-8">
                {{-- <h1 class="fw-bold text-center pb-3"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 30 30" style="fill: rgb(86, 106, 127);transform: ;msFilter:;"><path d="M21 10H3a1 1 0 0 0-1 1 10 10 0 0 0 5 8.66V21a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1.34A10 10 0 0 0 22 11a1 1 0 0 0-1-1zM9 9V7.93a4.51 4.51 0 0 0-1.28-3.15A2.49 2.49 0 0 1 7 3V2H5v1a4.51 4.51 0 0 0 1.28 3.17A2.49 2.49 0 0 1 7 7.93V9zm4 0V7.93a4.51 4.51 0 0 0-1.28-3.15A2.49 2.49 0 0 1 11 3V2H9v1a4.51 4.51 0 0 0 1.28 3.15A2.49 2.49 0 0 1 11 7.93V9zm4 0V7.93a4.51 4.51 0 0 0-1.28-3.15A2.49 2.49 0 0 1 15 3V2h-2v1a4.51 4.51 0 0 0 1.28 3.15A2.49 2.49 0 0 1 15 7.93V9z"></path></svg>DIGITAL WAITER</h1> --}}
                <div class="card">
                    <div class="card-body px-4 pb-4 pt-4">
                        <div class="text-center mb-4">
                            <h2 class="mb-2">Hasil Diagnosa</h2>
                            <p class="fst-italic">Hasil diagnosa kerusakan komputer dengan metode forward chaining</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $konsultasi->nama_lengkap }}" disabled/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $konsultasi->email }}" disabled/>
                            </div>
                        </div>
                        {{-- <div class="mb-3">
                        </div>
                        <div class="mb-3">
                        </div> --}}
                        <div class="mb-3">
                            <label for="os" class="form-label">Sistem Operasi</label>
                            <input type="text" class="form-control" id="os" name="os" value="{{ $konsultasi->os }}" disabled/>
                        </div>
                        <div class="mb-3">
                            <label for="gejala" class="form-label">Gejala</label>
                            <textarea class="form-control" id="gejala" name="gejala" disabled rows="4">{{ $gejala }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="kerusakan" class="form-label">Kerusakan</label>
                            <input type="text" class="form-control" id="kerusakan" name="kerusakan" disabled value="{{ $kerusakan }}">
                        </div>
                        <div class="mb-3">
                            <label for="solusi" class="form-label">Solusi</label>
                            <textarea class="form-control" id="solusi" name="solusi" disabled rows="4">{{ $solusi }}</textarea>
                        </div>
                        <a href="/" class="btn btn-primary w-100 py-2 mt-2 mb-2" type="submit">Diagnosa Ulang</a>
                        <hr>
                        <p class="text-center mb-0">Presented by <a href="javascript:void(0)">Ando and Team</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="text-end px-4 py-1">
        <a href="/auth" class="fs-5">Login</a>
    </div> --}}

@endsection