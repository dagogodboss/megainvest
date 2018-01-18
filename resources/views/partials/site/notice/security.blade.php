@if(LogUser()->stage == 'notice')
	<div class="container-fluid p-l-25 p-r-25 p-t-0 p-b-25 col-md-6 sm-padding-10">
		<div class="row">
			<div class="card social-card share  full-width m-b-10 no-border" data-social="item">
				<div class="card-header ">
					<h1 class="text-primary pull-left fs-1">Security Alert !!! 
						<i class="fa fa-circle text-danger fs-2"></i>
						<i class="fa fa-circle text-danger fs-4"></i>
						<i class="fa fa-circle text-danger fs-6"></i>
					</h1>
					<div class="pull-right small hint-text">
						
					</div>
				<div class="clearfix"></div>
				</div>
				<div class="card-description">
					<h5>
						Your Account is not completely secure. We strongly recommend that you please activate the Two Way Authenticator on the <a href="{{ route('settings') }}" class="btn btn-cons">Settings Page</a>. 
					</h5>
				</div>
				<div class="card-footer clearfix">
					<div class="pull-left">Notice 
						<i class="fa fa-circle text-danger fs-11"></i>
					</div>
					<div class="pull-right hint-text">
						{{ Carbon\Carbon::now() }}
					</div>
				<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	@else
		@include('partials.users.tools.history')
@endif