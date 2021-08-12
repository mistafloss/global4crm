@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Weekly Target</div>
                <div class="card-body">
                    <p>{{$data['weekStartDate']}} to {{$data['weekEndDate']}}</p>
                    <table class="table">
                        <tr>
                            <td><h3 class="text-primary">Target</h3> </td>
                            <td>£3000</td>
                        </tr>
                        <tr>
                            <td><h3 class="text-primary">Your Sales This Week </h3></td>
                            <td>
                                @if(!empty($data['agent'][0]['current_sale']))
                                    £{{$data['agent'][0]['current_sale']}}
                                @else
                                    £0
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
