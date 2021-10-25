@extends('layouts.guestStyle', [
    'class' => '',
    'elementActive' => 'progress'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Progress Chart</h5>
                        <p class="card-category">Graphical representation of season information</p>
                    </div>
                    <div class="card-body" style="min-height:400px">
                        @if ($noOfSeasons==0)
                        <div class="container"><h1 class="text-center">No Seasons Yet</h1></div>

                            @else
                            <div class="float-right" style="margin: -10px 20px 30px 0">
                                <ul class="navbar-nav">
                                    <li class="nav-item btn-rotate dropdown">
                                        <a class="form-control text-secondary dropdown-toggle" id="navbarDropdownMenuLink2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
                                            Options-- </i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('guest.progress') }}">Current Season</a>
                                                @if($noOfSeasons>1)
                                                    <a class="dropdown-item" href="{{ route('guest.comparefromlast') }}">Compare from Last Season</a>
                                                @endif
                                                @if($noOfSeasons>4)
                                                    <a class="dropdown-item" href="{{ route('guest.lastfive') }}">Last 5 Seasons</a>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="container">
                                <h4>Compare Last 2 Seasons</h4>
                                <div id="compareChart" style="height: 300px;"></div>
                            </div>
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const chart = new Chartisan({
            el: '#compareChart',
            url: "@chart('compare_from_last_chart')",
            hooks: new ChartisanHooks()
                .beginAtZero()
                .datasets([
                    {
                        type:'line',
                        lineTension: 0,
                        fill: false,
                        borderColor: "#f17e5d",
                        backgroundColor: "#f17e5d",
                        pointBorderColor: '#f17e5d',
                        pointBorderWidth: 4,
                        pointRadius: 2,
                        pointHoverRadius: 4,  
                        borderWidth: 3, 
                    },
                    {
                        type:'line',
                        lineTension: 0,
                        fill: false,
                        borderColor: "#51cbce",
                        backgroundColor: "#51cbce",
                        pointBorderColor: '#51cbce',
                        pointBorderWidth: 4,
                        pointRadius: 2,
                        pointHoverRadius: 4,  
                        borderWidth: 3,
                    },
                    {
                        type:'line',
                        lineTension: 0,
                        fill: false,
                        borderColor: "#6bd098",
                        backgroundColor: "#6bd098",
                        pointBorderColor: '#6bd098',
                        pointBorderWidth: 4,
                        pointRadius: 2,
                        pointHoverRadius: 4,  
                        borderWidth: 3,
                    }
                ])
        });


        /*$(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });*/
    </script>
@endpush