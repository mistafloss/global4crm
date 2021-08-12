@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Order Details</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="display-5 text-primary">Customer Info</h5>
                                <table class="table">
                                    <tr>
                                        <td width="15%" class="font-weight-bold">Customer Name</td>
                                        <td>{{$data['order']->customer->full_name}}</td>
                                        <td width="15%" class="font-weight-bold">Customer Address  </td>
                                        <td>{{$data['order']->customer->address}} </td>
                                        <td width="15%" class="font-weight-bold">Postcode</td>
                                        <td>{{$data['order']->customer->post_code}}</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" class="font-weight-bold">Phone Number</td>
                                        <td>{{$data['order']->customer->phone}}</td>
                                        <td width="15%" class="font-weight-bold">Email Address</td>
                                        <td>{{$data['order']->customer->email_address}}</td>
                                        <td width="15%" class="font-weight-bold"></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="display-5 text-primary">Order Info</h5>
                                <table class="table">
                                    <tr>
                                        <td width="15%" class="font-weight-bold">Broadband Package</td>
                                        <td>{{$data['order']->broadbandPackage->name}}</td>
                                        <td width="15%" class="font-weight-bold">Total Price  </td>
                                        <td>£{{$data['order']->total_price}} </td>
                                        <td width="15%" class="font-weight-bold">Initial Deposit</td>
                                        <td>£{{$data['order']->initial_deposit}}</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" class="font-weight-bold">Telesales Agent</td>
                                        <td>{{$data['order']->agent->name}}</td>
                                        <td width="15%" class="font-weight-bold">Order Date</td>
                                        <td>{{$data['order']->created_at->format('d M Y')}}</td>
                                        <td width="15%" class="font-weight-bold">Contract Duration</td>
                                        <td>{{$data['order']->contract->duration}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
