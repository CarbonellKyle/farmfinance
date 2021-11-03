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
                                <div class="icon-big text-center icon-info">
                                    <i class="nc-icon nc-shop text-info"></i>
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
                                <div class="icon-big text-center icon-success">
                                    <i class="nc-icon nc-chart-bar-32 text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Profit</p>
                                    <p class="card-title">
                                        <span @if ($profit<1) class="text-danger" @elseif($profit>0) class="text-success" @endif >
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
            <!-- BreakdownExpenses::Begin -->
            <div class="col-lg-3 col-md-6 col-sm-6s h-100">
                <div class="card card-stats" style="min-height: 180px">
                    <div class="card-header">
                        <h5 class="card-category"><strong>Expenses Breakdown</strong></h5>
                    </div>
                    <div class="card-body">
                        <p style="margin-top: -10px">
                            <i class="nc-icon nc-alert-circle-i text-info" style="cursor: pointer" title="Total amount paid to workers"></i>
                            <strong><span style="opacity: 0.5">Wage: </span>{{ $isCurrent == true ? $wage : '-- --' }}</strong>
                        </p>
                        <p style="margin-top: -10px">
                            <i class="nc-icon nc-alert-circle-i text-info" style="cursor: pointer" title="Total expenses from materials such as fertilizers and insecticides"></i>
                            <strong><span style="opacity: 0.5">Purchase: </span>{{ $isCurrent == true ? $matExpense : '-- --' }}</strong>
                        </p>
                        <p style="margin-top: -10px">
                            <i class="nc-icon nc-alert-circle-i text-info" style="cursor: pointer" title="Total tax paid within the season"></i>
                            <strong><span style="opacity: 0.5">Tax: </span>{{ $isCurrent == true ? $tax : '-- --' }}</strong>
                        </p>
                    </div>
                </div>
            </div>
            <!-- BreakdownExpenses::End -->

            <!-- SeasonInfo::Begin -->
            <div class="col-md-6 col-sm-6">
                <div class="card card-stats" style="min-height: 180px">
                    <div class="card-header">
                        <p class="description"><strong>Current Season: {{ $isCurrent == true ? 'Season ' . $lastSeason->season_id  : 'Season hasn\'t started yet' }}</strong>
                            <span class="float-right" href="#">
                                <i @if ( $isCurrent==true ) class="icon-big nc-icon nc-sun-fog-29 text-warning" @else class="icon-big nc-icon nc-sun-fog-29" @endif></i>
                            </span>
                        </p>
                        <p class="description" style="margin-top: -23px"><strong>Date Started: </strong><span class="btn btn-sm btn-success">{{ $isCurrent == true ?  date('M d, Y', strtotime($lastSeason->start_date)) : '--:--' }}</span></p>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            <!-- SeasonInfo::End -->

            <div class="col-lg-3 col-md-6 col-sm-6">
                
                <div class="row">
                    <!-- Loss::Begin -->
                    <div class="col-lg-12 col-md-12 col-sm-12 h-100">
                        <div class="card card-stats" style="min-height: 90px">
                            <div class="card-header">
                                <h5 class="card-category"><strong>Loss</strong>
                                    <i class="nc-icon nc-alert-circle-i text-info" style="cursor: pointer" title="Loss is the amount to make up from the capital you spent"></i>
                                </h5>
                            </div>
                            <div class="card-body pb-3">
                                <h5 style="margin-top: -15px" @if($loss<0) class="text-danger text-center" @else class="text-success text-center" @endif><strong>{{ $loss < 0 ? $loss*-1 : 'You have no loss' }}</strong></h5>
                            </div>
                        </div>
                    </div>
                    <!-- Loss::End -->
                </div>

                <div class="row">
                    <!-- Calendar::Begin -->
                    <div class="col-lg-12 col-md-12 col-sm-12 h-100">
                        <div class="card card-stats" style="min-height: 90px">
                            <div class="card-header">
                                <h5 class="card-category"><strong>Calendar</strong>
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
            
        </div>
    </div>
@endsection