@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card card-dark">
        <div class="card-header text-center">
            <h4 class="text-dark">Add new category</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('categories.store') }}" class="needs-validation" novalidate>
                @csrf
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-layer-group text-muted"></i>
                            </div>
                        </div>

                        <input id="nama_kategori" type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                            name="nama_kategori" required autofocus>

                        @error('nama_kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-pen text-muted"></i>
                            </div>
                        </div>

                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                            name="description">

                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-lg btn-block">
                        Kirim!!
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('js/hashpassword.js') }}"></script> --}}
@endpush
