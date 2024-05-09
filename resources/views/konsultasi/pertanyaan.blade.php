@extends('layouts.main')

@section('content')
    <div class="container-fluid container-p-y row justify-content-center align-items-center">
        <div class="row justify-content-center align-items-center h-full w-full">
            <div class="col-xl-5 col-md-8 h-full w-full">
                <div class="card">
                    <div class="text-center mt-5">
                        <h3 class="mb-4">Jawab pertanyaan berikut</h3>
                    </div>
                    <div class="card-body px-4 pb-3 pt-4">
                        <main class="form-signin text-center">
                            <form action="/konsultasi/pertanyaan" method="POST">
                                @csrf
                                <h5 class="fw-normal">{{ $aturan->gejala->pertanyaan }}</h5>
                                <div class="mb-4" style="font-size: 1.15em">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('next') is-invalid @enderror" type="radio"
                                            id="next_false" value="{{ $aturan->next_false }}" name="next" required>
                                        <label class="form-check-label" for="next_false">Tidak</label>
                                    </div>
                                    <div class="form-check form-check-inline me-5">
                                        <input class="form-check-input @error('next') is-invalid @enderror" type="radio"
                                            id="next_true" value="{{ $aturan->next_true }}" name="next" required>
                                        <label class="form-check-label" for="next_true">Ya</label>
                                    </div>
                                    @error('next')
                                        <div class="invalid-feedback text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row mb-4">
                                    @if ($aturan->gejala_sebelum)
                                        <div class="col">
                                            <a href="/konsultasi/pertanyaan/{{ $aturan->gejala_sebelum }}"
                                                class="btn btn-outline-primary w-100 py-2">Sebelumnya</a>
                                        </div>
                                    @endif
                                    <div class="col">
                                        <button class="btn btn-primary w-100 py-2" type="submit">Lanjut</button>
                                    </div>
                                </div>
                            </form>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
