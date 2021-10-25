@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'materials'
])

@section('content')
    <div class="content">
        <!-- Heading  -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-9">
                                <h4 class="card-title"> Material Expenses  <i class="icon-big nc-icon nc-cart-simple text-warning"></i></h4>
                            </div>
                            <div class="col-lg-3">
                                @if(!isset($inactive))
                                <span><strong style="opacity: 0.5">Total Expenses: </strong><span class="btn btn-success"> {{ $total }} </span></span>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-3">
                                <a class="btn btn-info text-light" href="{{ route('expense.addMatExpense') }}" <?php if(isset($inactive)){ ?> disabled <?php } ?> >
                                    <i class="nc-icon nc-cart-simple text-light mr-2"></i>
                                    Record Purchase
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

        <!-- This Month  -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> This Month</h4>
                        <h5 class="card-category">Season No</h5>
                    </div>
                    <div class="card-body">
                        @if($monthly_count==0)
                            <div class="alert alert-warning" role="alert">
                                    {{'No Records This Month'}}
                            </div>

                            @else
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th class="text-center">
                                            Date
                                        </th>
                                        <th class="text-center">
                                            Name
                                        </th>
                                        <th class="text-center">
                                            Quantity
                                        </th>
                                        <th class="text-center">
                                            Cost
                                        </th>
                                        <th class="text-center">
                                            Action
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($monthly_expenses as $expense)
                                        <tr>
                                            <td class="text-center">
                                                {{ $expense->date }}
                                            </td>
                                            <td class="text-center">
                                                {{ $expense->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $expense->quantity }}
                                            </td>
                                            <td class="text-center">
                                                {{ $expense->cost }}
                                            </td>
                                            <td class="text-center">
                                                <a class="text-info mr-2" href="/materials/edit/{{ $expense->material_expense_id }}">
                                                    <i class="nc-icon nc-paper text-info"></i>
                                                    Info
                                                </a>
                                                <a class="text-danger" href="/materials/delete/{{ $expense->material_expense_id }}">
                                                    <i class="nc-icon nc-simple-remove text-danger"></i>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right mr-4">{{ $monthly_expenses->links("pagination::bootstrap-4") }}</div>
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
                        <h5 class="card-category">Season No</h5>
                    </div>
                    <div class="card-body">
                        @if($numRows==0)
                            <div class="alert alert-warning" role="alert">
                                    {{'No Records This Season'}}
                            </div>

                            @else
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th class="text-center">
                                            Date
                                        </th>
                                        <th class="text-center">
                                            Name
                                        </th>
                                        <th class="text-center">
                                            Quantity
                                        </th>
                                        <th class="text-center">
                                            Cost
                                        </th>
                                        <th class="text-center">
                                            Action
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($expenses as $expense)
                                        <tr>
                                            <td class="text-center">
                                                {{ $expense->date }}
                                            </td>
                                            <td class="text-center">
                                                {{ $expense->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $expense->quantity }}
                                            </td>
                                            <td class="text-center">
                                                {{ $expense->cost }}
                                            </td>
                                            <td class="text-center">
                                                <a class="text-info mr-2" href="/materials/edit/{{ $expense->material_expense_id }}">
                                                    <i class="nc-icon nc-paper text-info"></i>
                                                    Info
                                                </a>
                                                <a class="text-danger" href="/materials/delete/{{ $expense->material_expense_id }}">
                                                    <i class="nc-icon nc-simple-remove text-danger"></i>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="float-right mr-4">{{ $expenses->links("pagination::bootstrap-4") }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection