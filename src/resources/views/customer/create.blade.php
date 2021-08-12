@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add New Customer</div>
                    <div class="card-body">
                        @include('partials.flashmessage')
                        <form method="POST" action="{{route('customer.store')}}">
                            @csrf
                            <div class="form-group row">
                                <div class="col form-group">
                                    <label for="" class="">Full Name</label>
                                    <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}">
                                    @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col form-group">
                                    <label for="" class="">Email</label>
                                    <input type="text" id="email_address" type="text" class="form-control @error('email_address') is-invalid @enderror" name="email_address" value="{{ old('email') }}">
                                    @error('email_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col form-group">
                                    <label for="" class="">Address</label>
                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror">{{old('address')}}</textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col form-group">
                                    <label for="" class="">Postcode</label>
                                    <input type="text" id="post_code" type="text" name="post_code" class="form-control @error('post_code') is-invalid @enderror" name="post_code" value="{{ old('post_code') }}">
                                    @error('post_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col form-group">
                                    <label for="" class="">Phone</label>
                                    <input type="text" id="phone" type="text" name="phone"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{ old('phone') }}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col form-group" style="margin-top:37px;">
                                    <input style="" type="submit" class="btn btn-sm btn-success" value="Continue">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
