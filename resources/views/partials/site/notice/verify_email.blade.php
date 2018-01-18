
		<div class="container-fluid" style="">
			<div class="row justify-content-center">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default bg-pale-white">
		    	        <div class="panel-header">
			                <div class="panel-title">
			                    <h5 class="text-center text-muted">We'v sent you an email. However you can change your email using the form below.</h5>
			                </div>
			            </div>
			            <div class="panel-body">
			    			<form class="form-horizontal" method="POST" action="{{ route('update_email') }}">
			    				{{ csrf_field() }}
			                	<div class="row">
						            <div class="col-md-12">
						            <div class="form-group{{ $errors->has('old_email') ? ' has-error' : '' }}  form-group-default">
						                <label for="old_email">Verification Code</label>
						                    <input id="old_email" value="{{ old('old_email') }}" type="text" class="form-control" name="old_email" required>
						                    @if ($errors->has('old_email'))
						                        <span class="help-block">
						                            <strong>{{ $errors->first('old_email') }}</strong>
						                        </span>
						                    @endif
						            </div>
						            </div>
						        </div>
								<div class="row">
						            <div class="col-md-12">
						            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}  form-group-default">
						                <label for="email">Verification Code</label>
						                    <input id="email" value="{{ old('email') }}" type="text" class="form-control" name="email" required>
						                    @if ($errors->has('email'))
						                        <span class="help-block">
						                            <strong>{{ $errors->first('email') }}</strong>
						                        </span>
						                    @endif
						            </div>
						            </div>
						        </div>
						        <div class="row">
						        	<div class="col-md-6 col-md-offset-4">
						        		<div class="form-group">
						        			<button class="btn btn-default">
						        				Change Email		
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