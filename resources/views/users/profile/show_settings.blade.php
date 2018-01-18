@extends('layouts.dashboard')
@push('after-style')
	<style type="text/css">
		.margin-2{
			margin: 20px !important;
			margin-bottom: 30px !important;
		}
	</style>
@endpush
@section('content')
	<div class="card card-default">
		<div class="card-header ">
			<div class="card-title">
				<h2>
					Settings Page
				</h2>	
			</div>
		</div>
		<div class="card-block">
			<div class="row margin-2">
				<div class="col-md-8">
					<h3>
						<big >
							Activate Two way authentication
						</big>
						<p>
							You will receive short code on your phone every time you try to login. 
						</p>
					</h3>
				</div>
				<div class="col-md-4">
					<button class="auth btn btn-cons @if(LogUser()->tfa_security) dtwa btn-danger @else twa btn-complete @endif ">
						@if(LogUser()->tfa_security) De-Activate @else Activate @endif
					</button> 
				</div>
			</div>
			<div class="row margin-2">
				<div class="col-md-8">
					<h3>
						<big >
							Activate Withdrawal Password
						</big>
						<p>
							You will have to provide this password whenever you want to withdraw your funds. 
						</p>
					</h3>
				</div>
				<div class="col-md-4 wth-pot">
						@if(LogUser()->password != null)
							<button class="btn btn-cons btn-danger remove-pass">
								Remove Password
							</button>
						@else
							<div class="form-group form-group-default">
								<label>Withdrawal Password</label>
								<input type="text" class="form-control withdraw" name="withdrawal_password" placeholder="Your Secondary password." />
							</div>
						@endif
				</div>
			</div>
		</div>
	</div>
	@push('after-scripts')
		<script type="text/javascript">
			
			$('.twa').click(function(event) {
				$(this).prop('disabled', 'disabled');
				$(this).removeClass('dtwa');
				$.get('{{url('twa_active')}}', function(data) {
					$('button.auth').removeClass('btn-complete').removeClass('twa').addClass('btn-danger').addClass('dtwa');
					$('button').removeProp('disabled');
					$('button.auth').html('De-Activate');
					success_alert()
				});
			});
			
			$('.dtwa').click(function(event) {
				$(this).prop('disabled', 'disabled');
				$(this).removeClass('twa');
				$.get('{{url('twa_deactive')}}', function(data) {
					$('button.auth').removeClass('btn-danger').removeClass('dtwa').addClass('btn-complete').addClass('twa');
					$('button').removeProp('disabled');
					$('button.auth').html('Activate');
					success_alert()
				});
			});
			
			$('button.remove-pass').click(function(){
				$(this).prop('disabled', 'disabled')
				$.get('{{ url('removepass') }}', function(data) {
					$('div.wth-pot').html('<div class="form-group form-group-default"><label>Withdrawal Password</label><input type="text" class="form-control withdraw" name="withdrawal_password" placeholder="Your Secondary password." /></div>')
					success_alert();
				});
			});

			$('input.withdraw').change(function() {	
				var data = $(this).val()
				$.get('{{ url('with_pass') }}'+'/'+data, function(data) {
					$('div.wth-pot').html('<button class="btn btn-cons btn-danger remove-pass">Remove Password</button>');
					success_alert()
				});
			});
		</script>
	@endpush
@endsection
