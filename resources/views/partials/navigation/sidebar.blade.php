<nav class="page-sidebar" data-pages="sidebar">
	<div class="sidebar-header">
	<big class="site-name">{{ app_name() }}</big>
	</div>
	<div class="sidebar-menu">
		<ul class="menu-items">
			<li class="m-t-30 ">
				<a href="{{ route('home') }}" class="detailed">
					<span class="title">Dashboard</span>
					<span class="details">notifaction</span>
				</a>
				<span class="icon-thumbnail"><i data-feather="shield"></i></span>
			</li>
			<li class="">
				<a href="{{ route('profile')}}"><span class="title">Profile</span></a>
				<span class="icon-thumbnail"><i data-feather="users"></i></span>
			</li>
			<li class="">
					<a href="@#" class="inactive" >
						<span class="title">
							Lending
						</span>
					</a>
					<span class="icon-thumbnail"><i data-feather="grid"></i></span>
			</li>
			<li class="">
				<a href="@#" class="inactive" >
					<span class="title">Exchanger</span>
				</a>
			<span class="icon-thumbnail"><i data-feather="bar-chart"></i></span>
			</li>
			<li class="">
				<a href="@#depost" class="inactive" >
					<span class="title">Transfer</span>
				</a>
				<span class="icon-thumbnail"><i data-feather="life-buoy"></i></span>
			</li>
			<li class="">
				<a href="{{ route('wallet') }}">
					<span class="title">Wallets</span>
				</a>
				<span class="icon-thumbnail">
						<i class="fs-14 sl-wallet"></i>
				</span>
			</li>
			<li class="">
				<a href="{{ url('/settings') }}">
					<span class="title">
						Settings
					</span>
				</a>
				<span class="icon-thumbnail"><i class="sl-settings"></i></span>
			</li>
			<li class="">
				<a href="{{ url('/logout') }}">
					<span class="title">Logout</span></a>
				<span class="icon-thumbnail"><i class="fs-14 pg-power"></i></span>
			</li>
		</ul>
	<div class="clearfix"></div>
	</div>

</nav>
@push('after-scripts')
<script type="text/javascript">
	$('a.inactive').on('click',  function(event) {
		event.preventDefault();
		$('#modalSlideUp').modal('show')
	});
</script>
<div class="modal fade slide-up disable-scroll" id="modalSlideUp" tabindex="-1" role="dialog" aria-hidden="false">
	<div class="modal-dialog ">
		<div class="modal-content-wrapper">
			<div class="modal-content">
				<div class="modal-header clearfix text-left">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<i class="pg-close fs-14"></i>
					</button>
					<h5>Attention !!!</span></h5>
				</div>
				<div class="modal-body">
					<p>
						<big>
							<b>Please note: your account has has not been approved for this action.</b>
						</big>
					</p>
				</div>
			</div>
		</div>

	</div>
	</div>
@endpush
