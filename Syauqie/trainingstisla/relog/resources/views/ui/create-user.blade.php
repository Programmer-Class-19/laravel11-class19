@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card card-dark">
        <div class="card-header text-center">
            <h4 class="text-dark">Add new user</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.store') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user text-muted"></i>
                            </div>
                        </div>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" tabindex="1" required autofocus>

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-envelope text-muted"></i>
                            </div>
                        </div>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" tabindex="1" required autofocus>

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>



                <div class="form-group">
                    <label for="password">Password</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-lock text-muted"></i>
                            </div>
                        </div>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" tabindex="2" required>

                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary toggle-password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-lg btn-block" tabindex="4">
                        Kirim!!
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/hashpassword.js') }}"></script>
@endpush
