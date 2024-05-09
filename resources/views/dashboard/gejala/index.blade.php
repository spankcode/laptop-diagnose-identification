@extends('dashboard.layouts.main')

@section('content')

    <div class="container container-p-y">
        <div class="card">
            <h5 class="card-header">Data Gejala</h5>
            <div class="card-body">
                <h6><a href="/dashboard/gejala/create" class="btn btn-primary">Tambah Data Gejala</a></h6>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kode Gejala</th>
                                <th class="text-start">Nama Gejala</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data_gejala->count())
                                @foreach ($data_gejala as $gejala)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $gejala->kode_gejala }}</td>
                                    <td class="text-start">{{ $gejala->nama_gejala }}</td>
                                    <td class="text-center">
                                    <a href="/dashboard/gejala/{{ $gejala->kode_gejala }}/edit" class="btn btn-primary badge my-badge"><i class="bx bx-pencil"></i></a>
                                    <form action="/dashboard/gejala/{{ $gejala->kode_gejala }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger badge my-badge btn-delete"><i class="bx bx-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr class="text-center">
                                    <td colspan="4">Tidak ada data.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection