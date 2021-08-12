@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Customers</div>
                    <div class="card-body">
                        @include('partials.flashmessage')
                        @if(!empty($data['customers']))
                            <table class="table">
                                <thead>
                                <tr class="table-primary">
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Postcode</th>
                                    <th scope="col">Address </th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Phone</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['customers'] as $customer)
                                    <tr>
                                        <td>{{$customer->full_name}}</td>
                                        <td>{{$customer->post_code}}</td>
                                        <td>{{$customer->address}}</td>
                                        <td>{{$customer->email_address}}</td>
                                        <td>{{$customer->phone}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <h1> There are no Customers currently available.</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
