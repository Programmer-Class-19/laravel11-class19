@extends('layouts.app')

@section('title', 'Products')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Transaction</h1>
                <div class="section-header-button">
                    <a href="{{ route('transactions.create') }}" class="btn btn-primary">Mode kasir</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Transaction</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Transaction</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <select class="form-control selectric">
                                            <option>Action For Selected</option>
                                            <option>Move to Draft</option>
                                            <option>Move to Pending</option>
                                            <option>Delete Permanently</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <form method="GET" action="{{ route('transactions.index') }}">
                                            <div class="input-group">
                                                <input type="text" name="search" class="form-control"
                                                    placeholder="Search" value="{{ request('search') }}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>User ID</th>
                                                <th>Type</th>
                                                <th>Total</th>
                                                <th>Date</th>
                                                <th>Items</th>
                                            </tr>
                                        </thead>
                                        @if ($data->isEmpty())
                                            <tr>
                                                <td colspan="9" class="text-center">Produk tidak ditemukan.</td>
                                            </tr>
                                        @else
                                            <tbody>
                                                @foreach ($data as $index => $transaction)
                                                    <tr>
                                                        <td>{{ $transaction->id }}</td>
                                                        <td>{{ $transaction->user_id }}</td>
                                                        <td>{{ ucfirst($transaction->transaction_type) }}</td>
                                                        <td>{{ number_format($transaction->total, 0, ',', '.') }}</td>
                                                        <td>{{ $transaction->transaction_date }}</td>
                                                        <td>
                                                            <ul>
                                                                @foreach ($transaction->transactionItems as $item)
                                                                    <li>
                                                                        {{ $item->product->name }} -
                                                                        {{ $item->quantity }} x
                                                                        {{ number_format($item->price, 0, ',', '.') }} =
                                                                        {{ number_format($item->total, 0, ',', '.') }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <a href="{{ route('transactions.edit', $product->id) }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </a>
                                                                <a href="#" onclick="confirmDelete(this)"
                                                                    data-inv="{{ $product->id }}"
                                                                    class="btn btn-icon btn-sm icon-left btn-danger d-inline"
                                                                    style="cursor:pointer">
                                                                    <i class="fas fa-exclamation-triangle"></i> Delete
                                                                </a>

                                                                <form id="delete-product-{{ $product->id }}"
                                                                    action="{{ route('transactions.destroy', $product->id) }}"
                                                                    method="POST" class="d-none">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>


                                <!-- Pagination -->
                                {{-- <div class="float-right">
                                    <nav>
                                        <ul class="pagination">
                                            <li class="page-item {{ $data->onFirstPage() ? 'disabled' : '' }}">
                                                <a class="page-link" href="{{ $data->previousPageUrl() }}"
                                                    aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            @for ($i = 1; $i <= $data->lastPage(); $i++)
                                                <li class="page-item {{ $data->currentPage() == $i ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $data->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li class="page-item {{ $data->hasMorePages() ? '' : 'disabled' }}">
                                                <a class="page-link" href="{{ $data->nextPageUrl() }}" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div> --}}

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

    <script>
        function confirmDelete(element) {
            // Ambil nilai INV dari atribut data-inv
            const inv = element.getAttribute('data-inv');
            const confirmAction = confirm(`Are you sure you want to delete product with ID ${inv}?`);
            if (confirmAction) {
                // Jika dikonfirmasi, temukan dan submit form penghapusan
                document.getElementById(`delete-product-${inv}`).submit();
            }
        }
    </script>
@endpush
