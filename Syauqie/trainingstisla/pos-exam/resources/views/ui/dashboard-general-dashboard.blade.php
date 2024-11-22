@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
    <style>
        /* Animasi dan efek hover pada statistik */
        .card-statistic-1:hover {
            transform: scale(1.05);
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }
        .progress-bar {
            background: linear-gradient(45deg, #4e73df, #1cc88a);
        }
        /* Gaya tambahan untuk tooltip */
        .card-icon i {
            font-size: 28px;
            color: #fff;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <!-- Loop over statistic cards to create a uniform look -->
                @php
                    $statistics = [
                        ['icon' => 'far fa-user', 'title' => 'Total Admin', 'value' => 10, 'bg' => 'bg-primary'],
                        ['icon' => 'far fa-newspaper', 'title' => 'News', 'value' => 42, 'bg' => 'bg-danger'],
                        ['icon' => 'far fa-file', 'title' => 'Reports', 'value' => '1,201', 'bg' => 'bg-warning'],
                        ['icon' => 'fas fa-circle', 'title' => 'Online Users', 'value' => 47, 'bg' => 'bg-success'],
                    ];
                @endphp
                @foreach($statistics as $stat)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon {{ $stat['bg'] }}">
                                <i class="{{ $stat['icon'] }}"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{ $stat['title'] }}</h4>
                                </div>
                                <div class="card-body">{{ $stat['value'] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Bagian Statistik dengan Grafik -->
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistics</h4>
                            <div class="card-header-action">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Week</a>
                                    <a href="#" class="btn">Month</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" height="180"></canvas>
                            <div class="statistic-details mt-sm-4">
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span> 7%</span>
                                    <div class="detail-value">$243</div>
                                    <div class="detail-name">Today's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-danger"><i
                                                class="fas fa-caret-down"></i></span> 23%</span>
                                    <div class="detail-value">$2,902</div>
                                    <div class="detail-name">This Week's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span>9%</span>
                                    <div class="detail-value">$12,821</div>
                                    <div class="detail-name">This Month's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i
                                                class="fas fa-caret-up"></i></span> 19%</span>
                                    <div class="detail-value">$92,142</div>
                                    <div class="detail-name">This Year's Sales</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bagian Referral dengan Progress Bar -->
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Referral URL</h4>
                        </div>
                        <div class="card-body">
                            @php
                                $referrals = [
                                    ['source' => 'Google', 'visits' => '2,100', 'width' => '80%'],
                                    ['source' => 'Facebook', 'visits' => '1,880', 'width' => '67%'],
                                    ['source' => 'Bing', 'visits' => '1,521', 'width' => '58%'],
                                    ['source' => 'Yahoo', 'visits' => '884', 'width' => '36%'],
                                    ['source' => 'Kodinger', 'visits' => '473', 'width' => '28%'],
                                    ['source' => 'Multinity', 'visits' => '418', 'width' => '20%'],
                                ];
                            @endphp
                            @foreach($referrals as $ref)
                                <div class="mb-4">
                                    <div class="text-small font-weight-bold text-muted float-right">{{ $ref['visits'] }}</div>
                                    <div class="font-weight-bold mb-1">{{ $ref['source'] }}</div>
                                    <div class="progress" data-height="3">
                                        <div class="progress-bar" role="progressbar" data-width="{{ $ref['width'] }}" aria-valuenow="{{ $ref['width'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
