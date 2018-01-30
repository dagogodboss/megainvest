@extends('layouts.bladelayout')

@section('content')
	<div class="container-fluid p-t-30 p-b-30 ">
		<div class="row">
			<div class="col-lg-4">
				<div class="container-xs-height">
					<div class="row-xs-height">
						<div class="social-user-profile col-xs-height text-center col-top">
							<div class="thumbnail-wrapper d48">
								<img alt="Avatar" style="width: 100%;" data-src-retina="assets/img/profiles/avatar_small2x.png" data-src="assets/img/profiles/avatar.png" src="assets/img/profiles/avatar.png">
							</div>
						</div>
						<div class="col-xs-height p-l-20">
							<h3 class="no-margin p-b-5"> {{ LogUser()->name }} </h3>
								<p class="no-margin fs-16">
									You Joined on {{ LogUser()->created_at }}
								</p>
								<p class="hint-text m-t-5 small">
									{{ LogUser()->country_code->country }} | Account 
							<i class="fa fa-check-circle text-success fs-16 m-t-10"></i> Verified
								</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-8">
				<div class="col-md-7 col-sm-12 col-xl-8 m-b-5 pull-right bg-master-darkest  no-padding b-a b-grey text-white">
					<big class="p-l-15">
						{{ app_name() }} Bitcoin Account
					</big>
					<div class="bg-white m-t-25 p-t-5 p-l-15 p-b-5 p-r-15 text-master">
						<big>
							<small>
								{{ LogUser()->account_details->account_address }}
							</small>
							<small class="pull-right">
								{{ LogUser()->account_details->balance }}
							</small>
						</big>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xl-8 m-b-5 pull-right bg-master no-padding b-a b-grey text-white">
					<big class="p-l-15">
						{{ app_name() }} Lending Account
					</big>
					<div class="bg-white m-t-25 p-t-5 p-l-15 p-b-5 p-r-15 text-master">
						<big>
							<small>
								{{ LogUser()->account_details->account_address }}
							</small>
							<small class="pull-right">
								{{ LogUser()->account_details->balance }}
							</small>
						</big>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xl-8 m-b-5 pull-right bg-menu-light no-padding b-a b-grey text-white">
					<big class="p-l-15">
						{{ LogUser()->name }} Bitcoin Address
					</big>
					<div class="bg-white m-t-25 p-t-5 p-l-15 p-b-5 p-r-15 text-master">
						<big>
							<small>
								{{ LogUser()->account_details->account_address }}
							</small>
							<small class="pull-right">
								{{ LogUser()->account_details->balance }}
							</small>
						</big>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xl-8 m-b-5 pull-right bg-master-dark no-padding b-a b-grey text-white">
					<big class="p-l-15">
						{{ LogUser()->name }} USD Account
					</big>
					<div class="bg-white m-t-25 p-t-5 p-l-15 p-b-5 p-r-15 text-master">
						<big>
							<small>
								{{ LogUser()->usd_account()->account_address }}
							</small>
							<small class="pull-right">
								{{ LogUser()->usd_account()->balance }}
							</small>
						</big>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card card-default">
					<div class="card-block text-center">
						<div class="thumbnail-wrapper d48" style="width: 300px; height: 300px; border-radius: 100%; border:1px dashed #b3b3b3; justify-content: center !important;">
							<img alt="Avatar" style="width: 100%; margin:auto 0px" data-src-retina="assets/img/profiles/avatar_small2x.png" data-src="assets/img/profiles/avatar.png" src="assets/img/profiles/avatar.png">
						</div>
						<h2 class="text-master m-t-25 m-b-15"> 
							{{ LogUser()->name }}
						</h2>
						<h5 class="text-master m-t-25 m-b-15"> 
							{{ LogUser()->email }}
						</h5>
						<h2 class="text-master m-t-25 m-b-15"> 
							{{  LogUser()->country_code->code.LogUser()->phone_number }}
						</h2>
					</div>
					<div class="card-footer">
						Profile Details can not be Edited.
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
