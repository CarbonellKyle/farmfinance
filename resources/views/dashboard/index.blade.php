@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
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
                                    <p class="card-title"> {{ $isCurrent == true ? $totalYield . ' kg' : '-- --' }}
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
            <!-- Reminders::Begin -->
            <div class="col-md-6 col-sm-6">
                <div class="card card-stats" style="min-height: 180px">
                    <form method="POST" action="{{ route('reminder.update') }}">
                        @csrf
                        <div class="card-header">
                            <h5 class="card-category text-danger"><strong>Reminders</strong>
                                <a class="float-right btn btn-sm btn-info" id="editBut" href="#" title="Edit" onclick="(editBut.style='display: none', dii.style='visibility: hidden', note.style='display: inline-block', done.style='display: inline-block', discard.style='display: inline-block')">
                                    <i class="nc-icon nc-paper"></i>
                                </a>
                                <a class="float-right btn btn-sm btn-danger text-light" id="discard" style="display: none" title="Discard" onclick="(editBut.style='display: inline-block', dii.style='visibility: inline-block', note.style='display: none', done.style='display: none', discard.style='display: none')">
                                    <i class="nc-icon nc-simple-remove"></i>
                                </a>
                                <button type="submit" class="float-right btn btn-sm btn-success" id="done" style="display: none" title="Done">
                                    <i class="nc-icon nc-check-2"></i>
                                </button>
                            </h5>

                        </div>

                        <div class="card-body">
                            <input type="hidden" name="id" value="{{ $reminder->reminder_id }}">
                            <input type="text" id="note" name="reminder" value="{{ $reminder->reminder }}"  class="form-control" style="display: none" placeholder="You can write some reminders here!">
                            <div id="dii" class="container">
                                <p>{{ $reminder->reminder }}</p>
                            </div>        
                        </div>
                    </form>
                </div>
            </div>
            <!-- Reminders::End -->

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

        <div class="row">
            <!-- SeasonInfo::Begin -->
            <div class="col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header">
                        <h5 class="card-category"><strong><span class="text-info">Current Season:</span></strong> {{ $isCurrent == true ? 'Season ' . $lastSeason->season_id  : 'Season hasn\'t started yet' }}
                            <span class="float-right" href="#">
                                <i @if ( $isCurrent==true ) class="icon-big nc-icon nc-sun-fog-29 text-warning" @else class="icon-big nc-icon nc-sun-fog-29" @endif></i>
                            </span>
                        </h5>
                        <p class="card-category"><strong><span class="text-info">Date Started:</span></strong> {{ $isCurrent == true ? $lastSeason->start_date : '--:--' }}</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form class="col-lg-4" method="POST" action="{{ route('season.start') }}">
                                @csrf
                                <button type="submit" class="btn btn-success" <?php if($isCurrent == true){ ?> disabled <?php } ?> >Start Season</button>
                            </form>
                            <form class="col" method="POST" action="{{ route('season.end') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger" <?php if($isCurrent == false){ ?> disabled <?php } ?> >End Season</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- SeasonInfo::End -->

        </div>


    </div>
@endsection

