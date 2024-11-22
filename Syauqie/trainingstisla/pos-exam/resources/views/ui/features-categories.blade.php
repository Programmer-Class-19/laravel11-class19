@extends('layouts.app')

@section('title', 'Categories')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Categories</h1>
                <div class="section-header-button">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New Category</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Categories</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Categories</h4>
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
                                    <form method="GET" action="{{ route('categories.index') }}">
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
                                @if ($isEmpty)
                                    <div>
                                        <p>Tidak ada kategori yang ditemukan untuk pencarian:
                                            <strong>{{ $search }}</strong>.
                                        </p>
                                    </div>
                                @endif

                                    <div class="table-responsive">
                                        <table class="table-striped table">
                                            <tr>
                                                <th>No</th>
                                                <th>Kategori</th>
                                                <th>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                            @if ($data->isEmpty())
                                                <tr>
                                                    <td colspan="9" class="text-center">Produk tidak ditemukan.</td>
                                                </tr>
                                            @else
                                                @foreach ($data as $index => $category)
                                                    <tr>
                                                        <td>{{ ($data->currentPage() - 1) * $data->perPage() + $index + 1 }}
                                                        </td>
                                                        <td>{{ ucwords($category->name) }}</td>
                                                        <td>{{ ucwords($category->description ?? 'Ngga ada deskripsi') }}</td>
                                                        <td>
                                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                                class="btn btn-icon btn-sm icon-left btn-primary d-inline">
                                                                <i class="far fa-edit"></i> Edit
                                                            </a>
                                                            <a href="#" onclick="confirmDelete({{ $category->id }})"
                                                                class="btn btn-icon btn-sm icon-left btn-danger d-inline"
                                                                style="cursor:pointer">
                                                                <i class="fas fa-exclamation-triangle"></i> Delete
                                                            </a>
                                                            <form id="delete-category-{{ $category->id }}"
                                                                action="{{ route('categories.destroy', $category->id) }}"
                                                                method="POST" class="d-none">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @endif
                                        </table>
                                    </div>


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
                                                    <a class="page-link" href="{{ $data->nextPageUrl() }}"
                                                        aria-label="Next">
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
        function confirmDelete(categoryId) {
            if (confirm("Apakah Anda yakin ingin menghapus kategori ini?")) {
                document.getElementById('delete-category-' + categoryId).submit();
            }
        }
    </script>
@endpush
