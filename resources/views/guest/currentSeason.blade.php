@extends('layouts.guestStyle', [
    'class' => '',
    'elementActive' => 'currentSeason'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-cart-simple text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Expenses</p>
                                    <p class="card-title"> {{ $isCurrent == true ? $totalExpenses : '-- --' }}
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-sucess">
                                    <i class="nc-icon nc-shop text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Yeilds</p>
                                    <p class="card-title"> {{ $isCurrent == true ? $totalYield : '-- --' }}
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-primary">
                                    <i class="nc-icon nc-money-coins text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Revenue</p>
                                    <p class="card-title"> {{ $isCurrent == true ? $totalRevenue : '-- --' }}
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-danger">
                                    <i class="nc-icon nc-chart-bar-32 text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Profit</p>
                                    <p class="card-title">
                                        <span @if ($profit<0) class="text-danger" @elseif($profit>0) class="text-success" @endif >
                                            {{ $isCurrent == true ? $profit : '-- --' }}
                                        </span>
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- SeasonInfo::Begin -->
            <div class="col-md-6 col-sm-6">
                <div class="card card-stats" style="min-height: 180px">
                    <div class="card-header">
                        <h5 class="card-category "><strong><span class="text-info">Current Season:</span></strong> {{ $isCurrent == true ? 'Season ' . $lastSeason->season_id  : 'Season hasn\'t started yet' }}
                            <span class="float-right" href="#">
                                <i @if ( $isCurrent==true ) class="icon-big nc-icon nc-sun-fog-29 text-warning" @else class="icon-big nc-icon nc-sun-fog-29" @endif></i>
                            </span>
                        </h5>
                        <p class="card-category"><strong><span class="text-info">Date Started:</span></strong> {{ $isCurrent == true ? $lastSeason->start_date : '--:--' }}</p>
                    </div>
                    <div class="card-body">
                        
                        
                    </div>
                </div>
            </div>
            <!-- SeasonInfo::End -->

            <!-- BreakdownExpenses::Begin -->
            <div class="col-lg-3 col-md-6 col-sm-6s h-100">
                <div class="card card-stats" style="min-height: 180px">
                    <div class="card-header">
                        <h5 class="card-category text-info"><strong>Expenses Breakdown</strong></h5>
                    </div>
                    <div class="card-body">
                        <p style="margin-top: -23px"><strong><span style="opacity: 0.5">Wage: </span></strong><span class="btn btn-sm btn-success">{{ $isCurrent == true ? $wage : '-- --' }}</span></p>
                        <p style="margin-top: -23px"><strong><span style="opacity: 0.5">Purchase: </span></strong><span class="btn btn-sm btn-success">{{ $isCurrent == true ? $matExpense : '-- --' }}</span></p>
                        <p style="margin-top: -23px"><strong><span style="opacity: 0.5">Tax: </span></strong><span class="btn btn-sm btn-success">{{ $isCurrent == true ? $tax : '-- --' }}</span></p>
                    </div>
                </div>
            </div>
            <!-- BreakdownExpenses::End -->

            <!-- Calendar::Begin -->
            <div class="col-lg-3 col-md-6 col-sm-6s h-100">
                <div class="card card-stats" style="min-height: 90px">
                    <div class="card-header">
                        <h5 class="card-category text-success"><strong>Calendar</strong>
                            <input type="date" class="form-control" style="
                                background: transparent;
                                color: transparent;
                                border: transparent;
                                cursor: pointer;
                                position: absolute;
                                width: auto;
                            ">
                        </h5>
                    </div>
                </div>
            </div>
            <!-- Calendar::End -->
        </div>
    </div>
@endsection