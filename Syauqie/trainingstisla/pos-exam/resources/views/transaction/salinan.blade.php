@extends('layouts.app')

@section('title', 'Transaction')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('css/transaction.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Transaction</h1>
                <div class="section-header-button">
                    <a href="" class="btn btn-primary">New Transaction</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Transaction</div>
                </div>
            </div>

            <div class="section-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>No Invoice :</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                                    <td>{{ $product->stock }}</td>
                                                    <td>
                                                        <form action="{{ route('transactions.addToCart') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product->id }}">
                                                            <input type="number" name="quantity" value="1"
                                                                min="1" max="{{ $product->stock }}"
                                                                class="form-control" style="width: 100px;">
                                                            <button type="submit" class="btn btn-primary mt-2">Add to
                                                                Cart</button>
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

                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Cost</h4>
                                <div class="d-flex justify-content-between">
                                    <span>Rp. </span>
                                    <span>{{ number_format($total, 2, '.', ',') }}</span>
                                </div>
                            </div>

                            <div class="card-body">
                                <h4 class="card-title">Payment</h4>
                                <input type="number" class="form-control" placeholder="Enter amount"
                                    wire:model.live='bayar'>
                            </div>

                            <div class="card-body">
                                <h4 class="card-title">Change</h4>
                                <div class="d-flex justify-content-between">
                                    <span>Rp. </span>
                                    <span>{{ number_format(2000, 2, '.', ',') }}</span>
                                </div>
                            </div>

                            <div class="card-body">
                                <h3>Total: Rp{{ number_format($total, 0, ',', '.') }}</h3>

                                <form action="{{ route('transactions.checkout') }}" method="POST">
                                    @csrf
                                    <label for="payment_method">Payment Method:</label>
                                    <select name="payment_method" id="payment_method" class="form-control">
                                        <option value="cash">Cash</option>
                                        <option value="credit">Credit</option>
                                    </select>
                                    <button type="submit" class="btn btn-success mt-2">Checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
