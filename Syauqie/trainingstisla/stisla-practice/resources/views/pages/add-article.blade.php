@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Validation</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Form Validation</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Form Validation</h2>
                <p class="section-lead">
                    Form validation using default from Bootstrap 4
                </p>

                <div class="container mt-5">
                    <form id="dynamicForm">
                        <div class="card">
                            <div class="card-header">
                                <h4>Server-side Validation</h4>
                            </div>
                            <div class="card-body">
                                <!-- Your Name -->
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Your Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" class="form-control" placeholder="Enter your name" required>
                                        <div class="invalid-feedback">Name must be at least 3 characters.</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="username" class="form-control" placeholder="Enter your username" required>
                                        <div class="invalid-feedback">Username must be at least 3 characters.</div>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" id="email" class="form-control" placeholder="Enter your email" required>
                                        <div class="invalid-feedback">Please enter a valid email address.</div>
                                    </div>
                                </div>

                                <!-- Success/Error Messages -->
                                <div class="mt-3">
                                    <p class="success-message">Form submitted successfully!</p>
                                    <p class="error-message">Form submission failed. Please correct the errors above.</p>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

                <script src="{{ asset('js/form.js') }}"></script>

                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

            </div>
        </section>
    </div>
@endsection


@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
