@extends('layouts.guestStyle', [
    'class' => '',
    'elementActive' => 'history'
])

@section('content')
    <div class="content">
        <a class="btn btn-primary text-light" href="{{ route('guest.history') }}">
            <i class="nc-icon nc-minimal-left text-light"></i>
                Back
        </a>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('paper/img/bg/farm7.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="container-fluid mt-4">
                            <h5 class="title" style="opacity: 0.5">{{ 'Season ' . $season->season_id }}</h5>
                            <p class="description">
                                <strong>Date Started: </strong><span class="btn btn-sm btn-success">{{ date('M d, Y', strtotime($season->start_date)) }}</span>
                            </p>
                            <p class="description" style="margin-top: -23px">
                                <strong>Date Ended: </strong><span class="btn btn-sm btn-danger">{{ date('M d, Y', strtotime($season->end_date)) }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="card-footer">
                        
                    </div>
                </div>
            </div>
            
            <!-- Info::Start -->
            <div class="col-md-6 col-sm-6 container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
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
                                            <p class="card-title"> {{ $totalExpenses }}
                                                <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
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
                                            <p class="card-title"> {{ $totalYield }}
                                                <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12">
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
                                            <p class="card-title"> {{ $totalRevenue }}
                                                <p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
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
                                                <span @if ($profit<1 ) class="text-danger" @elseif($profit>0) class="text-success" @endif >
                                                    {{ $profit }}
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
                    <div class="col-lg-6 col-md-12 col-sm-12 h-100">
                        <div class="card card-stats" style="min-height: 180px">
                            <div class="card-header">
                                <h5 class="card-category"><strong>Expenses Breakdown</strong></h5>
                            </div>
                            <div class="card-body">
                                <p style="margin-top: -10px">
                                    <i class="nc-icon nc-alert-circle-i text-info" style="cursor: pointer" title="Total amount paid to workers"></i>
                                    <strong><span style="opacity: 0.5">Wage: </span>{{$wage}}</strong>
                                </p>
                                <p style="margin-top: -10px">
                                    <i class="nc-icon nc-alert-circle-i text-info" style="cursor: pointer" title="Total expenses from materials such as fertilizers and insecticides"></i>
                                    <strong><span style="opacity: 0.5">Purchase: </span>{{$matExpense}}</strong>
                                </p>
                                <p style="margin-top: -10px">
                                    <i class="nc-icon nc-alert-circle-i text-info" style="cursor: pointer" title="Total tax paid within the season"></i>
                                    <strong><span style="opacity: 0.5">Tax: </span>{{$tax}}</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- BreakdownExpenses::End -->

                    <!-- Loss:Begin -->
                    <div class="col-lg-6 col-md-12 col-sm-12 h-100">
                        <div class="card card-stats" style="min-height: 90px">
                            <div class="card-header">
                                <h5 class="card-category"><strong>Loss</strong>
                                    <i class="nc-icon nc-alert-circle-i text-info" style="cursor: pointer" title="Loss is the amount to make up from the capital you spent"></i>
                                </h5>
                            </div>
                            <div class="card-body pb-3">
                                <h5 style="margin-top: -15px" @if($loss<0) class="text-danger text-center" @else class="text-success text-center" @endif><strong>{{ $loss < 0 ? $loss*-1 : 'No loss this season' }}</strong></h5>
                            </div>
                        </div>
                    </div>
                    <!-- Loss::End -->
                </div><!-- Row:End -->
            </div><!-- Info::End -->
        </div><!-- Row::End -->
    </div>
@endsection