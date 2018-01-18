@extends('layouts.auth')

@section('content')

<style type="text/css">
    body{
        overflow: auto;
    }
    .form-horizontal .form-group {
        border-bottom: 1px solid #eaecee;
        padding-top: 0px;
        padding-bottom: 4px;
        margin-bottom: 0;
    }        
</style>
    <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="col-sm-12 col-xl-8 ">
    <div class="card card-transparent ">
            <h2 class="flow-text padding-2 text-center">
                Please Fill The Form Below
            </h2>
    <form class="form-horizontal" method="POST" action="{{ route('set_account') }}">
    <ul class="tabs" data-init-reponsive-tabs="dropdownfx">
        <li class="tab">
            <a href="#" class="active" data-toggle="tab" data-target="#slide1"><span><big>Personal Information</big></span></a>
        </li>
        <li class="tab">
            <a href="#" data-toggle="tab" data-target="#slide2"><span><big>Account Details</big></span></a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane slide-left active" id="slide1">
             {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12 ">
                   <div class="row"> 
                   <div class="col-md-12">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}  form-group-default">
                            <label for="name">Full Name</label>
                                <input id="name" type="text"  class="form-control" name="name" 
                                value="@if(check($user->name)) {{ $user->name }} @else  {{ old('name') }}  @endif" required autofocus @if(check($user->name)) readonly @endif>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                   </div>   
                    </div>

            <div class="row">
                <div class="col-md-12">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}  form-group-default">
                    <label for="email">Email Address</label>
                        <input id="email" value="@if(check($user->email)) {{ $user->email }}  @else {{ old('email') }} @endif" type="text" class="form-control" name="email" required @if(check($user->email)) readonly @endif>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                <div class="form-group{{ $errors->has('country_code_id') ? ' has-error' : '' }}form-group-default ">
                    <label for="country_code">Country Code</label>
                        <select name="country_code_id" id="country_code">
                            <option value="">Select Your Country Code</option>
                            @forelse($country_code as $code)
                                <option value="{{ $code->id }}">
                                    {{ $code->code }} {{ $code->country}}
                                </option>
                            @empty
                                <option value="">
                                    No Country Code
                                </option>
                            @endforelse
                        </select>
                    @if ($errors->has('country_code_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('country_code_id') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>   

                <div class="col-md-8">
                    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}  form-group-default">
                <label for="phone_number"> Phone Number</label>
                        <input value="@if(check($user->phone_number)) {{ $user->phone_number }} @else {{ old('phone_number') }}  @endif" id="phone_number" type="text" class="form-control" name="phone_number" required @if(check($user->phone_number)) readonly @endif>

                        @if ($errors->has('phone_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                        @endif
                    </div>
            </div>
            </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button data-toggle="tab" data-target="#slide2" type="button" class="btn btn-info">
                        Next Page
                    </button>
                </div>
            </div>
        <br>
            <br>
        </div>
        <div class="tab-pane slide-right" id="slide2">
            <div class="row">
                <div class="col-md-12 ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group{{ $errors->has('bitcoin_address') ? ' has-error' : '' }}  form-group-default">
                        <label for="bitcoin_address">BTC Address</label>
                            <input id="bitcoin_address" type="text" class="form-control"  value="{{ old('bitcoin_address') }}" name="bitcoin_address" required>
                            @if ($errors->has('bitcoin_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('bitcoin_address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

            <br>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <input type="hidden" value="{{ $user->id }}" name="expert">
                    <button type="submit" class="btn btn-success btn-cons">
                        Save Details
                    </button>
                </div>
            </div>
            </div>
        </div>
                </div>
            </div>
        </div>
        </div>
    </form>
    </div>
        </div>
    </div>
    </div>
@endsection
