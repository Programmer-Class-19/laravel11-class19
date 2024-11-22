@extends('layouts.create')

@section('title', 'Advanced Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="card mx-auto">
                        <div class="card-header text-center">
                            <h4>Input Forms</h4>
                        </div>
                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('suppliers.store') }}">
                                @csrf

                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                                        </div>
                                        <input placeholder="Enter your name" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            type="text" value="{{ old('name') }}" required min="0"
                                            autocomplete="name">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- address --}}
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-location-dot"></i></span>
                                        </div>
                                        <input placeholder="Enter your address" name="address"
                                            class="form-control @error('address') is-invalid @enderror" id="address"
                                            type="text" value="{{ old('address') }}" required min="0"
                                            autocomplete="address">
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Contact -->
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-brands fa-whatsapp"></i></span>
                                        </div>
                                        <input placeholder="Enter your phone" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror" id="phone"
                                            type="phone" value="{{ old('phone') }}"  autocomplete="phone">

                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Kategori -->


                                <!-- Submit Button -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-submit">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>

    <!-- Select2 Initialization -->
@endpush
