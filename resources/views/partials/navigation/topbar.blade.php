<div class="header ">
	<a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar">
	</a>
	<div class="">
		<a href="#" class="btn btn-link text-primary m-l-20 hidden-md-down">
			<big>
				{{ app_name() }}
			</big>
		</a>
	</div>
	 <div class="d-flex align-items-center">
		<div class="pull-left p-r-10 fs-14 font-heading hidden-md-down m-l-20">
			<span class="semi-bold">
				{{ LogUser()->name }}
			</span> 
		</div>
		<div class="dropdown pull-right hidden-md-down">
			<button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="thumbnail-wrapper d32 circular inline">
					<img src="assets/img/profiles/avatar.jpg" alt="" width="32" height="32">
				</span>
			</button>
			<div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
				<a href="{{ url('/logout') }}" class="clearfix bg-master-dark dropdown-item">
					<span class="pull-left">
						Logout
					</span>
					<span class="pull-right">
						<i class="pg-power"></i>
					</span>
				</a>
			</div>
		</div>
			<a 
				href="#" 
				class="header-icon pg pg-alt_menu btn-link m-l-10 sm-no-margin @if(LogUser()->stage == 'how-it-work') change-stage @endif d-inline-block" 
				data-target="#modalSlideLeft" 
				data-toggle="modal"
				@if(LogUser()->stage == 'how-it-work')
				style="color:red !important"
				@endif
				>
					
				</a>
	</div>
</div>


<div class="modal fade slide-right" id="modalSlideLeft" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content-wrapper">
			<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<i class="pg-close fs-14"></i>
					</button>
				<div class="container-xs-height full-height">
					<div class="row-xs-height">
						 <div class="modal-body col-xs-height col-middle text-center">
							@if(LogUser()->stage == 'how-it-work')
								@include('partials.users.tools.how-it-work')
							@else
								@include('partials.users.tools.notice')
							@endif
							<button type="button" class="btn btn-primary btn-block" data-dismiss="modal">
								Close
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>