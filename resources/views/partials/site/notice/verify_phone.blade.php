
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
			    			<form class="form-horizontal" method="POST" action="{{ route('verify') }}">
			    				{{ csrf_field() }}
			                	<div class="row">
						            <div class="col-md-12">
						            <div class="form-group{{ $errors->has('phone_token') ? ' has-error' : '' }}  form-group-default">
						                <label for="phone_token">Verification Code</label>
						                    <input id="phone_token" value="{{ old('phone_token') }}" type="text" class="form-control" name="phone_token" required>
						                    @if ($errors->has('phone_token'))
						                        <span class="help-block">
						                            <strong>{{ $errors->first('phone_token') }}</strong>
						                        </span>
						                    @endif
						                     <span class="help-block">
		                                        <strong id="verifyphone"></strong>
		                                    </span>
						            </div>
						            </div>
						        </div>
						        <div class="row">
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
			                        <a href="{{ route('resend_code')}}" class="auth-link"> Resend Code</a>
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
					window.location = 'home';
				},
				error : function(data){
					 var obj = jQuery.parseJSON(data.responseText);
					$('div.progress').addClass('hide');
	                $('button').removeProp('disabled');
	                if (obj.phone_token) {
	                	$('#verifyphone').html(obj.phone_token);
	                }else{
	                	$('#verifyphone').html(obj.errors.phone_token);
	                }
				},
			})
			
		});
	</script>
@endpush