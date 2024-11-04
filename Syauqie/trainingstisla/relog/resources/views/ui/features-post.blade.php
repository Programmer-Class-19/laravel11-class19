@extends('layouts.app')

@section('title', 'Posts')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Posts</h1>
                <div class="section-header-button">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Posts</a></div>
                    <div class="breadcrumb-item">All Posts</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">All <span
                                                class="badge badge-white">{{ \App\Models\User::count() }}</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Posts</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Action For Selected</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Delete Pemanently</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <form>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($data as $index => $user)
                                            <tr>
                                                <td>{{ ($data->currentPage() - 1) * $data->perPage() + $index + 1 }}</td>
                                                <td>{{ $user['name'] }}
                                                </td>
                                                <td>
                                                    <a href="#">{{ $user['email'] }}</a>,
                                                </td>
                                                @if (!empty($user->updated_at))
                                                    <td>{{ $user->updated_at->format('d M Y') }}</td>
                                                @else
                                                    <td>{{ $user->created_at->format('d M Y') }}</td>
                                                @endif

                                                <td>
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-icon btn-sm icon-left btn-primary d-inline"><i
                                                            class="far fa-edit"></i> Edit</a>
                                                    <a href="#"
                                                        class="btn btn-icon btn-sm icon-left btn-danger d-inline"
                                                        style="cursor:pointer"
                                                        onclick="event.preventDefault(); document.getElementById('delete-user-{{ $user->id }}').submit();"><i
                                                            class="fas fa-exclamation-triangle"></i> Delete</a>
                                                </td>
                                                <form id="delete-user-{{ $user->id }}"
                                                    action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    <nav>
                                        <ul class="pagination">
                                            <!-- Previous Page Link -->
                                            <li class="page-item {{ $data->onFirstPage() ? 'disabled' : '' }}">
                                                <a class="page-link" href="{{ $data->previousPageUrl() }}"
                                                    aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>

                                            <!-- Loop untuk Halaman -->
                                            @for ($i = 1; $i <= $data->lastPage(); $i++)
                                                <li class="page-item {{ $data->currentPage() == $i ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $data->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor

                                            <!-- Next Page Link -->
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
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
