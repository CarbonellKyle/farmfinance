@extends('layouts.guestStyle', [
    'class' => '',
    'elementActive' => 'history'
])

@section('content')
    <div class="content">
        <a class="btn btn-info text-light" href="{{ route('guest.history') }}">
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
                            <h5 class="title text-info">{{ 'Season ' . $season->season_id }}
                                <span class="float-right" href="#">
                                    <i class="icon-big nc-icon nc-sun-fog-29 text-warning"></i>
                                </span>
                            </h5>
                            <p class="description">
                                <strong>Date Started: </strong>{{ $season->start_date }}
                            </p>
                            <p class="description">
                                <strong>Date Ended: </strong>{{ $season->end_date }}
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
                                        <div class="icon-big text-center icon-sucess">
                                            <i class="nc-icon nc-shop text-success"></i>
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
                                        <div class="icon-big text-center icon-danger">
                                            <i class="nc-icon nc-chart-bar-32 text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">Profit</p>
                                            <p class="card-title">
                                                <span @if ($profit<0 ) class="text-danger" @elseif($profit>0) class="text-success" @endif >
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
                    <div class="col-lg-12 col-md-6 col-sm-6s h-100">
                        <div class="card card-stats" style="min-height: 180px">
                            <div class="card-header">
                                <h5 class="card-category text-info"><strong>Expenses Breakdown</strong></h5>
                            </div>
                            <div class="card-body">
                                <p><strong><span class="text-info">Wage: </span></strong>{{ $wage }}</p>
                                <p><strong><span class="text-info">Purchase: </span></strong>{{ $matExpense }}</p>
                                <p><strong><span class="text-info">Tax: </span></strong>{{ $tax }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- BreakdownExpenses::End -->
                </div>
            </div><!-- Info::End -->
        </div><!-- Row::End -->
    </div>
@endsection