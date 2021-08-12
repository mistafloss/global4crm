@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">New Order</div>
                    <div class="card-body">
                        @include('partials.flashmessage')
                        <form method="POST" action="{{route('order.store')}}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6 form-group">
                                    <label for="" class="">Customer Name</label>
                                    <select class="form-control" id="customer_id" name="customer">
                                        <option value="" selected >--Select a customer--</option>
                                        @foreach($data['customers'] as $customer)
                                            @if($customer->id == app('request')->input('cuid'))
                                                <option value="{{$customer->id}}" selected> {{$customer->full_name}}</option>
                                            @else
                                                <option value="{{$customer->id}}"> {{$customer->full_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('customer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="order_details">
                                <div class="form-group row " id="">
                                    <label>  Broadband Packages</label>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="table-primary">
                                                <th scope="col">Package</th>
                                                <th scope="col">Download Speed</th>
                                                <th scope="col">Upload Speed</th>
                                                <th scope="col">Monthly Data Limit</th>
                                                <th scope="col">Connection Fee</th>
                                                <th scope="col">Monthly Payment</th>
                                                <th scope="col">Select</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['broadband_packages'] as $package)
                                            <tr>
                                                <td>{{$package->name}} </td>
                                                <td>{{$package->download_speed}}</td>
                                                <td>{{$package->upload_speed}}</td>
                                                <td>{{$package->monthly_data_limit}}</td>
                                                <td>£{{$package->connection_fee}}
                                                    <input type="hidden" id="{{$package->id}}_cnxfee"
                                                           value="{{$package->connection_fee}}"/>
                                                </td>
                                                <td>£{{$package->monthly_payment}}
                                                    <input type="hidden" id="{{$package->id}}_monthly_payment"
                                                           value="{{$package->monthly_payment}}"/>
                                                </td>
                                                <td>
                                                    <input class="form-control pkg-radio" type="radio" name="broadbandPackage" id="package-{{$package->id}}" value="{{$package->id}}">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group row">
                                    <div class="col form-group">
                                        <label>Contract Duration</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="contract_duration_12" name="contractDuration" value="12" class="custom-control-input">
                                            <label class="custom-control-label" for="contract_duration_12">12</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="contract_duration_24" name="contractDuration" value="24" class="custom-control-input">
                                            <label class="custom-control-label" for="contract_duration_24">24</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col form-group">
                                        <label>Total Price (£)</label>
                                        <input type="text" readonly class="form-control" name="total_price" id="total_price"/>
                                    </div>
                                    <div class="col form-group" style="">
                                        <label>Initial Deposit (£)</label>
                                        <input type="text" readonly class="form-control" id="display_initial_deposit" name="initial_deposit"/>
                                    </div>
                                    <div class="col form-group" style="">
                                        <label>Installments</label>
                                        <input type="text" class="form-control" readonly id="installments"/>
                                    </div>
                                </div>

                                <div class="form-group row order-form-footer">
                                    <div class="col-md-4" style="float:right">
                                        <input type="submit" class="btn btn-success" style="float:right" value="Place Order"/>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src=""></script>
    <script src="{{ asset('js/order.js') }}"></script>
@endsection
