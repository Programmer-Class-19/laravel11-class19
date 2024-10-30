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
                    <a href="features-post-create.html" class="btn btn-warning">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Posts</a></div>
                    <div class="breadcrumb-item">All Posts</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active bg-warning" href="#">All <span
                                                class="badge badge-white">{{ count($data) }}</span></a>
                                    </li>
                                </ul>
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
                                    <table class="table table-striped table-hover border">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Profil</th>
                                            <th>Created At</th>
                                        </tr>
                                        @foreach ($data as $user)
                                            <tr>
                                                <td>{{ $user->name }}
                                                    <div class="table-links">
                                                        <div class="btn-group" role="group">
                                                            <a href="#" class="btn btn-sm btn-info">View</a>
                                                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                                data-target="#confirmModal-{{ $user->id }}">Trash</button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        {{ $user->email }}
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="#">
                                                        <img alt="image" src="{{ asset('img/avatar/avatar-5.png') }}"
                                                            class="rounded-circle" width="35" data-toggle="title"
                                                            title="">
                                                    </a>
                                                </td>
                                                <td>{{ $user->created_at->format('d M Y') }}</td>
                                        @endforeach

                                    </table>
                                </div>
                                <div class="float-right">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination pagination-sm justify-content-end">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            @for ($i = 1; $i <= 5; $i++)
                                                <li class="page-item {{ $i == 1 ? 'active' : '' }}">
                                                    <a class="page-link" href="#">{{ $i }}</a>
                                                </li>
                                            @endfor
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
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

    <link rel="stylesheet" href="{{ asset('css/gpt.css') }}">
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
