@extends('layouts.auth')

@section('content')
@push('after-style')
<style type="text/css">
	.container-fluid,.container{
		margin-top: 20%;
	}
	body{
        overflow: auto;
    }
    .progress{
    	margin-top: 0px;
    	background: #fff;
    }
    .progress .indeterminate {
	    background-color: #7d37ae;
	}
</style>
@endpush
		<div class="progress hide">
                <div class="indeterminate"></div>
            </div>
  	@if(session('verify_phone'))
		@include('partials.site.notice.verify_phone')
	@endif
	@if(session('error'))
		@include('partials.site.notice.error')
	@endif
	@if(session('success'))
		@include('partials.site.notice.success')
	@endif
	@if(session('verify_email'))
		@include('partials.site.notice.success')
		@endif
@endsection
