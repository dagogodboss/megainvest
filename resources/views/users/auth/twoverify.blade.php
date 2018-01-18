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
  		
		<div class="container-fluid" style="">
			<div class="row justify-content-center">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default bg-pale-white">
		    	        <div class="panel-header">
			                <div class="panel-title">
			                    <h5 class="text-center text-muted">Phone Verification</h5>
			                </div>
			            </div>
			            <div class="panel-body">
			    			<form class="form-horizontal" method="POST" action="{{ route('verify_token') }}">
			    				{{ csrf_field() }}
			                	<div class="row">
						            <div class="col-md-12">
						            <div class="form-group{{ $errors->has('token') ? ' has-error' : '' }}  form-group-default">
						                <label for="token">Verification Code</label>
						                    <input id="token" value="{{ old('token') }}" type="text" class="form-control" name="token" required>
						                    @if ($errors->has('token'))
						                        <span class="help-block">
						                            <strong>{{ $errors->first('token') }}</strong>
						                        </span>
						                    @endif
						                     <span class="help-block">
		                                        <strong id="verifyphone"></strong>
		                                    </span>
						            </div>
						            </div>
						        </div>
						        <div class="row">
						        	<input type="hidden" name="user" value="{{ hashThis(session('user'))}}">
						        	<div class="col-md-6 col-md-offset-4">
						        		<div class="form-group">
						        			<button class="btn btn-default">
						        				Verify		
						        			</button>
						        		</div>
						        	</div>
						        </div>
						    </form>
			                    <p class="flow-text padding-2">
			                        Enter the code sent to your mobile device.<br>
			                        
			                    </p>
			                </div>
		            </div>
		        </div>
		    </div>
		</div>

		@push('after-scripts')
	<script type="text/javascript">
		$('form').submit(function(e) {
			var form = $(this);
			e.preventDefault();
			$('div.progress').removeClass('hide');
			$('strong#verifyphone').html( "" );
			$('button').prop('disabled');
			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				//dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: form.serialize(),
				success : function(data){
					if (data.success == 'done') {
						window.location = '{{url('/home')}}';
					}
				},
				error : function(data){
					 var obj = jQuery.parseJSON(data.responseText);
					$('div.progress').addClass('hide');
	                $('button').removeProp('disabled');
	                if (obj.token) {
	                	$('#verifyphone').html(obj.token);
	                }else{
	                	$('#verifyphone').html(obj.errors.token);
	                }
				},
			})
			
		});
	</script>
@endpush
@endsection
