@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span>
                        @if(!empty(app('request')->input('agent')))
                            My Orders
                        @else
                            Orders
                        @endif
                        </span>
                        <span style="display:block; float:right;">
                            <a href="{{route('customer.create')}}" class="btn btn-sm btn-success">+ Create New Order</a>
                        </span>
                    </div>
                    <div class="card-body">
                        @include('partials.flashmessage')
                        @if(count($data['orders']) > 0)
                            <table class="table">
                                <thead>
                                    <tr class="table-primary">
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Broadband Package</th>
                                        <th scope="col">Total price</th>
                                        <th scope="col">Initial Deposit</th>
                                        <th scope="col">Sales Agent</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['orders'] as $order)
                                    <tr>
                                        <td>{{$order->customer->full_name}}</td>
                                        <td>{{$order->broadbandPackage->name}}</td>
                                        <td>£{{$order->total_price}}</td>
                                        <td>£{{$order->initial_deposit}}</td>
                                        <td>{{$order->agent->name}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td><a href="{{route('order.show', $order->id)}}" class="btn btn-sm btn-primary">Details</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h1> There are no Orders available.</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
