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
                                <!-- Nama Produk -->
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input placeholder="Masukkan nama produk" name="name"
                                        class="form-control @error('name') is-invalid @enderror" type="text"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Varian</label>
                                    <input placeholder="Masukkan varian produk" name="varian"
                                        class="form-control @error('varian') is-invalid @enderror" type="text"
                                        value="{{ old('varian') }}">
                                    @error('varian')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Stock -->
                                <div class="form-group">
                                    <label>Stock</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-box"></i></span>
                                        </div>
                                        <input placeholder="Masukkan jumlah stok" name="stock"
                                            class="form-control @error('stock') is-invalid @enderror" type="number"
                                            value="{{ old('stock') }}" required min="0">
                                        @error('stock')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Price -->
                                <!-- Price -->
                                <div class="form-group">
                                    <label>Price</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-rupiah-sign"></i></span>
                                        </div>
                                        <input placeholder="Masukkan harga produk" name="price"
                                            class="form-control @error('price') is-invalid @enderror" type="text"
                                            id="price" value="{{ old('price') }}" required>
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Kategori -->
                                <div class="form-group">
                                    <label for="category_id">Kategori</label>
                                    <select name="category_id" id="category_id"
                                        class="form-control select2 @error('category_id') is-invalid @enderror" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($data as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
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
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('js/rupiah.js') }}"></script>
    <script src="{{ asset('js/pricerupiah.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>

    <!-- Select2 Initialization -->
    <script>
        $(document).ready(function() {
            $('#category_id').select2({
                placeholder: "Pilih Kategori",
                allowClear: true
            });
        });
    </script>


@endpush
