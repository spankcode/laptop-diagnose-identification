@extends('layouts.main')

@section('content')

    <div class="container container-p-y user-interface">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
                {{-- <h1 class="fw-bold text-center pb-3"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 30 30" style="fill: rgb(86, 106, 127);transform: ;msFilter:;"><path d="M21 10H3a1 1 0 0 0-1 1 10 10 0 0 0 5 8.66V21a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1.34A10 10 0 0 0 22 11a1 1 0 0 0-1-1zM9 9V7.93a4.51 4.51 0 0 0-1.28-3.15A2.49 2.49 0 0 1 7 3V2H5v1a4.51 4.51 0 0 0 1.28 3.17A2.49 2.49 0 0 1 7 7.93V9zm4 0V7.93a4.51 4.51 0 0 0-1.28-3.15A2.49 2.49 0 0 1 11 3V2H9v1a4.51 4.51 0 0 0 1.28 3.15A2.49 2.49 0 0 1 11 7.93V9zm4 0V7.93a4.51 4.51 0 0 0-1.28-3.15A2.49 2.49 0 0 1 15 3V2h-2v1a4.51 4.51 0 0 0 1.28 3.15A2.49 2.49 0 0 1 15 7.93V9z"></path></svg>DIGITAL WAITER</h1> --}}
                <div class="card">
                    <div class="card-body px-4 pb-4 pt-4">
                        <div class="text-center mb-4">
                            <h2 class="mb-1">Selamat Datang</h2>
                            <p class="fst-italic">di Sistem Pakar Diagnosa Kerusakan Komputer</p>
                        </div>
                        <main class="form-signin">
                            <form action="/konsultasi" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="{{ old('nama_lengkap') }}" required autocomplete="off"/>
                                    @error('nama_lengkap')
                                        <div class="invalid-feedback text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Alamat Email" value="{{ old('email') }}" required autocomplete="off"/>
                                    @error('email')
                                        <div class="invalid-feedback text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="os" class="form-label">Sistem Operasi</label>
                                    <select name="os" id="os" class="form-select @error('os') is-invalid @enderror">
                                        @foreach ($data_os as $os)
                                            <option value="{{ $os->nama }}" {{ old('os') == $os->nama ? 'selected' : '' }}>{{ $os->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('os')
                                        <div class="invalid-feedback text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary w-100 py-2 mt-2 mb-2" type="submit">Mulai Konsultasi</button>
                            </form>
                        </main>
                        <hr>
                        <p class="text-center mb-0">Presented by <a href="javascript:void(0)">Ando and Team</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end px-4 py-1">
        <a href="/auth" class="fs-5">Login</a>
    </div>

@endsection