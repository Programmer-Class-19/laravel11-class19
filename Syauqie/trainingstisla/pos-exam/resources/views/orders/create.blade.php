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
                            <form method="POST" action="{{ route('products.store') }}">
                                @csrf
                                <!-- supplier -->
                                <div class="form-group">
                                    <label for="supplier_id">Supplier</label>
                                    <select name="supplier_id" id="supplier_id"
                                        class="form-control select2 @error('supplier_id') is-invalid @enderror" required>
                                        <option value="">Pilih Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="customer_id">Customer</label>
                                    <select name="customer_id" id="customer_id"
                                        class="form-control select2 @error('customer_id') is-invalid @enderror" required>
                                        <option value="">Pilih Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="order_date">Tanggal order</label>
                                    <input placeholder="Masukkan nama produk" name="order_date"
                                        class="form-control @error('order_date') is-invalid @enderror" type="date"
                                        value="{{ old('order_date') }}" required>
                                    @error('order_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status" class="form-label">Status Pesanan</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="">-- Pilih Status Pesanan --</option>
                                        <option value="pending">Pending</option>
                                        <option value="completed">Completed</option>
                                    </select>
                                    <small class="form-text text-muted">
                                        Pilih status pesanan saat ini.
                                    </small>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="payment_status" class="form-label">Status Pembayaran</label>
                                    <select name="payment_status" id="payment_status" class="form-control" required>
                                        <option value="pending">Pending</option>
                                        <option value="paid">Paid</option>
                                        <option value="failed">Failed</option>
                                    </select>
                                    @error('payment_status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="payment_method" class="form-label">Metode Pembayaran</label>
                                    <<select name="payment_method" id="payment_method" class="form-control" required>
                                        <option value="">-- Pilih Metode Pembayaran --</option>
                                        <option value="credit_card">Credit Card</option>
                                        <option value="transfer">Bank Transfer</option>
                                        <option value="cash">Cash</option>
                                        </select>
                                        @error('payment_method')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>

                                {{-- <div class="form-group">
                                    <label for="payment_method">Metode Pembayaran</label>
                                    <select name="payment_method" id="payment_method" class="form-control" required>
                                        <option value="cash" {{ old('payment_method') == 'cash' ? 'selected' : '' }}>cash
                                        </option>
                                        <option value="transfer"
                                            {{ old('payment_method') == 'credit_card' ? 'selected' : '' }}>credit card
                                        </option>
                                        <option value="transfer"
                                            {{ old('payment_method') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                                    </select>
                                    @error('payment_method')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> --}}

                                <div class="form-group">
                                    <label for="discount" class="form-label">Diskon</label>
                                    <input type="number" step="0.01" name="discount" id="discount"
                                        class="form-control">
                                    @error('discount')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tax">Pajak</label>
                                    <input type="number" name="tax" id="tax" class="form-control"
                                        value="{{ old('tax') }}">
                                    @error('tax')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="shipping_address">Alamat Pengiriman</label>
                                    <textarea name="shipping_address" id="shipping_address" class="form-control" rows="3">{{ old('shipping_address') }}</textarea>
                                    @error('shipping_address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="shipping_status" class="form-label">Status Pengiriman</label>
                                    <select name="shipping_status" id="shipping_status" class="form-control" required>
                                        <option value="pending">Pending</option>
                                        <option value="shipped">Shipped</option>
                                        <option value="delivered">Delivered</option>
                                    </select>
                                    @error('payment_status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

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
    {{-- <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    {{-- <script src="{{ asset('js/rupiah.js') }}"></script>
    <script src="{{ asset('js/pricerupiah.js') }}"></script> --}}

    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script> --}}

    <!-- Select2 Initialization -->
@endpush
