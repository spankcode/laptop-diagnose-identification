@extends('dashboard.layouts.main')

@section('content')

    <div class="container container-p-y">
        <div class="card">
            <h5 class="card-header">Data Kerusakan</h5>
            <div class="card-body">
                <h6><a href="/dashboard/kerusakan/create" class="btn btn-primary">Tambah Data Kerusakan</a></h6>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kode Kerusakan</th>
                                <th class="text-start">Nama Kerusakan</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data_kerusakan->count())
                                @foreach ($data_kerusakan as $kerusakan)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kerusakan->kode_kerusakan }}</td>
                                    <td class="text-start">{{ $kerusakan->nama_kerusakan }}</td>
                                    <td>
                                        <a href="/dashboard/kerusakan/{{ $kerusakan->kode_kerusakan }}/edit" class="btn btn-primary badge my-badge"><i class="bx bx-pencil"></i></a>
                                        <form action="/dashboard/kerusakan/{{ $kerusakan->kode_kerusakan }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger badge my-badge btn-delete"><i class="bx bx-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr class="text-center">
                                    <td colspan="4">No data found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection