@extends('layouts.auth')

@section('content')
<div class="container login">
    <div class="row">
        <div class="col-md-5 col-md-offset-6" id="login-panel">
            <div class="panel panel-default bg-pale-white">
            <div class="panel-header">
                <div class="panel-title">
                    <h5 class="text-center text-muted"><i class="material-icons large">fingerprint</i> <br>Passwordless Authentication </h5>
                </div>
            </div>
                <div class="panel-body">
                <a href="{{url('login/facebook')}}" class="waves-effect waves-light btn-primary btn-lg btn btn-block">
                    <i class="fa fa-facebook-official pull-left"></i>
                    Login With Facebook 
                </a>
                <a href="{{config('app.link').'/login/twitter'}}" class="blue btn-lg btn btn-block">
                    <i class="fa fa-twitter-square pull-left"></i>
                    Login With Twitter 
                </a>
                <a href="{{url('login/google')}}" class="btn-lg btn red btn-block">
                    <i class="fa fa-google-plus pull-left"></i>
                    Login With Google Plus 
                </a>
                
                    <p class="flow-text padding-2">
                       To Prevent Dormant invalid Accounts. We only allow registration through the following Social Media account. 
                        <a href="{{ route('register')}}" class="auth-link"> Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

                    