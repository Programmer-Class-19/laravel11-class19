@extends('layouts.app')

@section('title', 'suppliers')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>suppliers</h1>
                <div class="section-header-button">
                    <a href="{{ route('orders.create') }}" class="btn btn-primary">Add new supplier</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">suppliers</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All suppliers</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Action For Selected</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Delete Permanently</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <form method="GET" action="{{ route('orders.index') }}">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Search"
                                                value="{{ request('search') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>
                                {{-- @if ($isEmpty)
                                    <div>
                                        <p>Tidak ada member yang ditemukan untuk pencarian:
                                            <strong>{{ $search }}</strong>.
                                        </p>
                                    </div>
                                @endif --}}

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>ID Pesanan</th>
                                            <th>Supplier</th>
                                            <th>Pelanggan</th>
                                            <th>Tanggal Pesanan</th>
                                            <th>Status</th>
                                            <th>Total Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                        {{-- @if ($data->isEmpty())
                                            <tr>
                                                <td colspan="9" class="text-center">Produk tidak ditemukan.</td>
                                            </tr>
                                        @else --}}
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>

                                                    <td>{{ $order->supplier->name }}</td>
                                                    <td>{{ $order->customer ? $order->customer->name : 'N/A' }}</td>
                                                    <td>{{ $order->order_date }}</td>
                                                    <td>{{ ucfirst($order->status) }}</td>
                                                    <td>{{ number_format($order->total_price, 2) }}</td>
                                                    <td>
                                                        <a href="{{ route('orders.show', $order->id) }}"
                                                            class="btn btn-info btn-sm">Detail</a>
                                                        <a href="{{ route('orders.edit', $order->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('orders.destroy', $order->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Yakin ingin menghapus pesanan?')">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        {{-- @endif --}}
                                    </table>
                                </div>

                                <!-- Modal untuk Edit supplier -->
                                {{-- <div class="modal fade" id="editUserModal" tabindex="-1"
                                    aria-labelledby="editUserModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form id="editUserForm">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editUserModalLabel">Edit Supplier</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" id="supplierId">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" id="name" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}

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
    {{-- <script src="{{ asset('js/ajax.js') }}"></script> --}}
    <script>
        function confirmDelete(supplierId) {
            if (confirm("Apakah Anda yakin ingin menghapus kategori ini?")) {
                document.getElementById('delete-suppliers-' + supplierId).submit();
            }
        }
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
@endpush
