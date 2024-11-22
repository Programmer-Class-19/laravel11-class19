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
            <form id="userForm"  data-url="{{ route('users.store') }}" method="POST">
                @csrf <!-- Token CSRF untuk keamanan -->
                <label for="name">Nama Pengguna</label>
                <input type="text" name="name" id="name" placeholder="Nama Pengguna" required>

                <label for="email">Email Pengguna</label>
                <input type="email" name="email" id="email" placeholder="Email Pengguna" required>

                <label for="password">Kata Sandi</label>
                <input type="password" name="password" id="password" placeholder="Kata Sandi" required>

                <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    placeholder="Konfirmasi Kata Sandi" required>

                <button type="submit">Daftar</button>
            </form>
        @endsection

        @push('scripts')
            <!-- JS Libraies -->

            <script src="{{ asset('css/ajax.css') }}"></script>
            <!-- Page Specific JS File -->
            <script src="{{ asset('js/hashpassword.js') }}"></script>
        @endpush
