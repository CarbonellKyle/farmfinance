@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'revenue'
])

@section('content')
    <div class="content">
        <!-- Heading -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-9">
                                <h4 class="card-title"> Sales  <i class="icon-big nc-icon nc-money-coins text-info"></i></h4>
                            </div>
                            <div class="col-lg-3">
                                @if(!isset($inactive))
                                <span><strong style="opacity: 0.5">Total Income: </strong><span class="btn btn-sm btn-info"> {{ $total }} </span></span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-3">
                                <a class="btn btn-primary text-light" href="{{ route('revenue.add') }}" <?php if(isset($inactive)){ ?> disabled <?php } ?> >
                                    <i class="nc-icon nc-money-coins text-light"></i>
                                    Record Sales
                                </a>
                            </div>
                            <div class="col-lg-5">
                                @if(isset($inactive))
                                <div class="alert alert-danger alert-dismissible fade show col">
                                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                    <span>
                                        {{$inactive}}
                                    </span>
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                @if(Session::has('record_deleted'))
                                <div class="alert alert-danger alert-with-icon alert-dismissible fade show"
                                    data-notify="container">
                                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                    <span data-notify="icon" class="nc-icon nc-bell-55"></span>
                                    <span data-notify="message">{{Session::get('record_deleted')}}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>

        <!-- This Month -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> This Month</h4>
                        <h5 class="card-category">{{isset($month) ? $month : ''}}</h5>
                    </div>
                    <div class="card-body">
                        @if($monthly_count==0)
                            <div class="alert alert-warning" role="alert">
                                    {{'No Records This Month'}}
                            </div>

                            @else
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-info">
                                        <th class="text-center">
                                            Date
                                        </th>
                                        <th class="text-center">
                                            Unit
                                        </th>
                                        <th class="text-center">
                                            Quantity
                                        </th>
                                        <th class="text-center">
                                            Price per unit
                                        </th>
                                        <th class="text-center">
                                            Total Price
                                        </th>
                                        <th class="text-center">
                                            Action
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($monthly_revenues as $revenue)
                                        <tr>
                                            <td class="text-center">
                                                {{ date('M d, Y', strtotime($revenue->date)) }}
                                            </td>
                                            <td class="text-center">
                                                {{ $revenue->unit }}
                                            </td>
                                            <td class="text-center">
                                                {{ $revenue->quantity }}
                                            </td>
                                            <td class="text-center">
                                                {{ $revenue->price_per_unit }}
                                            </td>
                                            <td class="text-center">
                                                {{ $revenue->total_price }}
                                            </td>
                                            <td class="text-center">
                                                <a class="text-info mr-2" href="/revenue/edit/{{ $revenue->revenue_id }}">
                                                    <i class="nc-icon nc-paper text-info"></i>
                                                    Info
                                                </a>
                                                <a class="text-danger" href="/revenue/delete/{{ $revenue->revenue_id }}">
                                                    <i class="nc-icon nc-simple-remove text-danger"></i>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right mr-4">{{ $monthly_revenues->links("pagination::bootstrap-4") }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- This Season -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> This Season</h4>
                        <h5 class="card-category">{{isset($season_id) ? 'Season ' . $season_id : ''}}</h5>
                    </div>
                    <div class="card-body">
                        @if($numRows==0)
                            <div class="alert alert-warning" role="alert">
                                    {{'No Records This Season'}}
                            </div>

                            @else
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-info">
                                    <th class="text-center">
                                            Date
                                        </th>
                                        <th class="text-center">
                                            Unit
                                        </th>
                                        <th class="text-center">
                                            Quantity
                                        </th>
                                        <th class="text-center">
                                            Price per unit
                                        </th>
                                        <th class="text-center">
                                            Total Price
                                        </th>
                                        <th class="text-center">
                                            Action
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($revenues as $revenue)
                                        <tr>
                                            <td class="text-center">
                                                {{ date('M d, Y', strtotime($revenue->date)) }}
                                            </td>
                                            <td class="text-center">
                                                {{ $revenue->unit }}
                                            </td>
                                            <td class="text-center">
                                                {{ $revenue->quantity }}
                                            </td>
                                            <td class="text-center">
                                                {{ $revenue->price_per_unit }}
                                            </td>
                                            <td class="text-center">
                                                {{ $revenue->total_price }}
                                            </td>
                                            <td class="text-center">
                                                <a class="text-info mr-2" href="/revenue/edit/{{ $revenue->revenue_id }}">
                                                    <i class="nc-icon nc-paper text-info"></i>
                                                    Info
                                                </a>
                                                <a class="text-danger" href="/revenue/delete/{{ $revenue->revenue_id }}">
                                                    <i class="nc-icon nc-simple-remove text-danger"></i>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right mr-4">{{ $revenues->links("pagination::bootstrap-4") }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection