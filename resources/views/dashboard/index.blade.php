@extends('dashboard.layouts.main')

@section('content')

    <div class="container container-p-y">
        {{-- <h5 class="fw-bold py-3 mb-2"><a href="/" class="nav-link d-inline m-0 p-0">{{ env('APP_NAME') }}</a><span class="text-muted fw-light"> /</span> Dashboard</h5> --}}
        @if (session()->has('success'))
            <div class="flash-data" data-flash="{{ session('success') }}"></div>
        @endif

        <div class="card mb-4 bg-info">
            <h6 class="card-header py-3 text-white">Selamat datang kembali di Sistem Pakar Diagnosa Kerusakan Komputer, Admin!</h6>
        </div>
        
    </div>

@endsection