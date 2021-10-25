@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'revenue'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header ">
                    <h4 class="card-title"> Revenue  <i class="icon-big nc-icon nc-money-coins text-info"></i></h4>
                    <a class="btn btn-info text-light" href="{{ route('revenue.index') }}">
                        <i class="nc-icon nc-minimal-left text-light"></i>
                        Back
                    </a>
                </div>

                <form class="col-md-12" action="{{ route('revenue.update') }}" method="POST"
                    oninput="t.value=parseInt(p.value)*parseInt(q.value)" >
                    @csrf
                    <input type="hidden" name="id" value="{{ $revenue->revenue_id }}" />

                    @if(Session::has('record_updated'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                aria-label="Close">
                                <i class="nc-icon nc-simple-remove"></i>
                            </button>
                            <span>
                                {{Session::get('record_updated')}}
                            </span>
                        </div>
                    @endif
                    
                    <div class="card-header">
                        <h5 class="title text-center">{{ __('Sale Record Info') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{ __('Unit') }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="unit" class="form-control" placeholder="Unit" value="{{ $revenue->unit }}" required>
                                </div>
                                @if ($errors->has('unit'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('unit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{ __('Quantity') }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="number" id="q" name="quantity" class="form-control" placeholder="Quantity" value="{{ $revenue->quantity }}" required>
                                </div>
                                @if ($errors->has('quantity'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{ __('Price per unit') }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="number" id="p" name="price_per_unit" class="form-control" placeholder="Price per unit" value="{{ $revenue->price_per_unit }}" required>
                                </div>
                                @if ($errors->has('price_per_unit'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('price_per_unit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{ __('Total Price') }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="number" id="t" for="p q" name="total_price" class="form-control" placeholder="Total Price" value="{{ $revenue->total_price }}" required>
                                </div>
                                @if ($errors->has('total_price'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('total_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{ __('Date') }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                                @if ($errors->has('date'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-info btn-round">{{ __('Update Info') }}</button>
                            </div>
                        </div>
                    </div>
            </form>
            </div>
        </div>

    </div>
@endsection