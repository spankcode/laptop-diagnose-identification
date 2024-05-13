@extends('dashboard.layouts.main')

@section('content')
    <div class="container container-p-y pt-2">
        <div class="card">
            <h5 class="card-header">Data Konsultasi</h5>
            <div class="card-body">
                {{-- <button class="btn btn-primary mb-3 btn-add" data-bs-toggle="modal" data-bs-target="#osModal">Tambah Data Baru</button> --}}
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 1px">No</th>
                                <th class="text-start">Nama</th>
                                <th class="text-start">Email</th>
                                <th>Kerusakan</th>
                                <th>Tanggal</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_konsultasi as $konsultasi)
                            @php
                                if ($konsultasi->kerusakan_id) {
                                    $kerusakan = $konsultasi->kerusakan->nama_kerusakan;
                                } else {
                                    $kerusakan = 'Tidak dapat mendeteksi kerusakan perangkat';
                                }
                            @endphp
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $konsultasi->nama_lengkap }}</td>
                                <td class="text-start">{{ $konsultasi->email }}</td>
                                <td>{{ $kerusakan }}</td>
                                <td>{{ date('d M Y', strtotime($konsultasi->created_at)) }}</td>
                                <td>
                                    <a href="/konsultasi/hasil/{{ $konsultasi->uuid }}" class="btn btn-primary badge my-badge btn-show">
                                        <i class="bx bx-show"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection