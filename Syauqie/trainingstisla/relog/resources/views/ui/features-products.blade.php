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
                <h1>Products</h1>
                <div class="section-header-button">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Products</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Products</h4>
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
                                        <form method="GET" action="{{ route('products.index') }}">
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
                                                <th>Invoice ID</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Stock</th>
                                                <th>Purchase Price</th>
                                                <th>Discount</th>
                                                <th>Unit</th>
                                                <th>Sale Price</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        @if ($data->isEmpty())
                                            <tr>
                                                <td colspan="9" class="text-center">Produk tidak ditemukan.</td>
                                            </tr>
                                        @else
                                            <tbody>
                                                @foreach ($data as $index => $product)
                                                    <tr>
                                                        <td>{{ $product->id }}</td>
                                                        <td>{{ $product->nama_produk }}</td>
                                                        <td>{{ $product->category->nama_kategori }}</td>
                                                        <td>{{ $product->stok }}</td>
                                                        <td>{{ formatRupiah($product->harga_beli) }}</td>
                                                        <td>{{ $product->diskon }}</td>
                                                        <td>{{ $product->satuan }}</td>
                                                        <td>{{ formatRupiah($product->harga_jual) }}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <a href="{{ route('products.edit', $product->id) }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </a>
                                                                <a href="#"
                                                                    onclick="confirmDelete({{ $product->id }})"
                                                                    class="btn btn-sm btn-danger">
                                                                    <i class="fas fa-trash"></i> Delete
                                                                </a>
                                                            </div>
                                                            <form id="delete-product-{{ $product->id }}"
                                                                action="{{ route('products.destroy', $product->id) }}"
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
                                <div class="float-right">
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
                                </div>

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
        function confirmDelete(productId) {
            if (confirm("Apakah Anda yakin ingin menghapus produk ini?")) {
                document.getElementById('delete-product-' + productId).submit();
            }
        }
    </script>
@endpush
