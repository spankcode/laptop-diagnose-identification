@extends('dashboard.layouts.main')

@section('content')

    <div class="container container-p-y">
        <div class="card">
            <h5 class="card-header">Data Aturan</h5>
            <div class="card-body">
                <h6><a href="/dashboard/aturan/create" class="btn btn-primary">Tambah Data Aturan</a></h6>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kode Aturan</th>
                                <th>Gejala</th>
                                <th>Gejala Sebelumnya</th>
                                <th>Ya</th>
                                <th>Tidak</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data_aturan->count())
                                @foreach ($data_aturan as $aturan)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $aturan->kode_aturan }}</td>
                                    <td class="text-start">{{ $aturan->gejala->kode_gejala }} - {{ $aturan->gejala->nama_gejala }}</td>
                                    <td>{{ $aturan->gejala_sebelum }}</td>
                                    <td>{{ $aturan->next_true }}</td>
                                    <td>{{ $aturan->next_false }}</td>
                                    <td>
                                        <a href="/dashboard/aturan/{{ $aturan->kode_aturan }}/edit" class="btn btn-primary badge my-badge"><i class="bx bx-pencil"></i></a>
                                        <form action="/dashboard/aturan/{{ $aturan->kode_aturan }}" method="post" class="d-inline">
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