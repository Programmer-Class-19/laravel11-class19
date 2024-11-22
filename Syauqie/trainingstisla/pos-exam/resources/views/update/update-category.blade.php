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
            <form method="POST" action="{{ route('categories.update', $category->id) }}" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama Kategori</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-layer-group text-muted"></i>
                            </div>
                        </div>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" required value="{{ old('name', $category->name) }}">

                        @error('name')
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
                            name="description" value="{{ old('description', $category->description) }}">

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
