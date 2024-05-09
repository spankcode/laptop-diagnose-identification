@extends('dashboard.layouts.main')

@section('content')
    <div class="container container-p-y">
        <div class="card">
            <h5 class="card-header">Data Sistem Operasi</h5>
            <div class="card-body">
                <button class="btn btn-primary mb-3 btn-add" data-bs-toggle="modal" data-bs-target="#osModal">Tambah Data Baru</button>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 1px">No</th>
                                <th class="text-start">Nama</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_os as $os)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $os->nama }}</td>
                                <td class="text-center">
                                    <button
                                        type="button"
                                        class="btn btn-primary badge my-badge btn-edit"
                                        data='{
                                            "uuid":"{{ $os->uuid }}",
                                            "name":"{{ $os->nama }}"
                                        }'
                                    >
                                        <i class="bx bx-pencil"></i>
                                    </button>
                                    <form action="/dashboard/os/{{ $os->uuid }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger badge my-badge btn-delete"><i class="bx bx-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Schedule Modal -->
    <div class="modal fade" id="osModal" tabindex="-1" aria-hidden="true"  data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="osModalLabel"></h1>
                </div>
                <form method="post" id="modalForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama OS</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Cth: Ubuntu" value="{{ old('nama') }}" required autocomplete="off"/>
                            @error('nama')
                                <div class="invalid-feedback text-start">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-cancel" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).on('click', '.btn-cancel', function(e) {
            e.preventDefault();
            $('input[name="_method"]').remove();
        });

        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();
            $('#modalForm').attr('action', '/dashboard/os');
            $('.modal-title').text('Tambah Data OS');

            const nameField = $('[name="nama"]');
            nameField.val('');
            setTimeout(function() { 
                nameField.focus(); 
            }, 400);
        });

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();
            $('#modalForm').prepend('@method("put")');
            $('.modal-title').text('Ubah Data OS');
            let data = JSON.parse($(this).attr('data'));

            $('#modalForm').attr('action', '/dashboard/os/' + data.uuid);
            const nameField = $('[name="nama"]');
            nameField.val(data.name);

            $('#osModal').modal('show');

            setTimeout(function() { 
                nameField.focus(); 
            }, 400);
        });
    </script>
@endsection