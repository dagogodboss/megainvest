@if(LogUser()->stage == 'how-it-work')
<div class="container-fluid p-l-25 p-r-25 p-t-0 p-b-25 col-md-6 sm-padding-10">
		<div class="row">
			<div class="card social-card share  full-width m-b-10 no-border" data-social="item">
				<div class="card-header ">
					<h4 class="text-primary pull-left fs-1">{{ app_name() }} Wiki
						<i class="fa fa-circle text-complete fs-2"></i>
						<i class="fa fa-circle text-complete fs-4"></i>
					</h4>
					<div class="pull-right small hint-text">
						
					</div>
				<div class="clearfix"></div>
				</div>
				<div class="card-description">
					<h5>
						To Understand what is going on please read the site Wiki on how to make the best of this site. <a href="#" data-target="#modalSlideLeft" data-toggle="modal" class="btn btn-cons change-stage">Wiki How Page</a>. 
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
@endif
@include('partials.users.tools.wallet.wallet')