@extends('layouts.dashboard')
@push('after-style')
	<style type="text/css">
		.nav-tabs-fillup > li > a.active {
    		z-index: 100;
    		color: #aaa !important;
		}
		
		.balance{
			border:1px solid #ccc;
			padding: 12px;
		}

		.btn-wallet-receive{
			background: #b3b3b5 !important; 
			color: #fff;
		}
		
		.btn-wallet-send{
			background: #b1b1b1 !important; 
			color: #fff;
		}
	</style>
@endpush
@section('content')
<div class="col-xl-12">
	<div class="card card-transparent ">
		<ul class="nav nav-tabs nav-tabs-simple hidden-sm-down bg-white nav-tabs-fillup" role="tablist" data-init-reponsive-tabs="dropdownfx">
			<li class="nav-item">
				<a href="#" data-toggle="tab" data-target="#bitcoin" class="active" aria-expanded="true">	Bitcoin Wallet
				</a>
			</li>
			<li class="nav-item">
				<a href="#" data-toggle="tab" data-target="#mainwallet"  aria-expanded="true">
					{{ app_name() }} Wallet
				</a>
			</li>
			<li class="nav-item">
				<a href="#" data-toggle="tab" data-target="#usdwallet" class="" aria-expanded="true">
					USD Wallet
				</a>
			</li>
		</ul>
		<div class="tab-content bg-white ">
			<div class="tab-pane slide-left active" id="bitcoin" aria-expanded="true">
				<div class="row column-seperation">
					<div class="col-lg-12">
						<big class="pull-right p-l-2 balance">BTC : 
							<!-- {{ LogUser()->bitcoin_wallets->balance }} -->
						</big><br>
							<div class="">
								<img style="width: 100px" src="{{ icons('btc')}}" alt="" class="img-responsive ">
							</div>
						<br>

						<div class="">
							<button class="btn btn-wallet-receive btn-cons">
								Receive	
							</button>
							<button class="btn btn-wallet-send btn-cons">
								Send
							</button>
						</div><br>
							<h3>
								<span class="semi-bold">
									{{ app_name() }} 
								</span><small>
									Bitcoin Wallet
								</small>
							</h3>
					</div>
					<div class="col-lg-6 col-sm-12">
						<div class="form-group-default form-group">
							<label>Bitcoin Address</label>
							<br>
							<div  class="form-control text-muted">
								<a href="{{ url('transaction') }}" class="wallet-link">
									<!-- {{LogUser()->bitcoin_wallets->address}} -->
								</a>
								<img class="img-responsive  pull-right" style="width:5%;" src="{{LogUser()->bitcoin_wallets->qrcode}}" alt="">
							</div>
							

						</div>
					</div>
					<div class="col-lg-6">
						
					</div>
				</div>
			</div>

			<div class="tab-pane slide-right" id="mainwallet" aria-expanded="true">
				<div class="row column-seperation">
					<div class="col-lg-12">
						<big class="pull-right p-l-2 balance">RC : 
							<!-- {{ LogUser()->bitcoin_wallets->balance }} -->
						</big><br>
							<div class="">
								<img style="width: 100px" src="{{ icons('rc')}}" alt="" class="img-responsive ">
							</div>
						<br>

						<div class="">
							<button class="btn btn-wallet-receive btn-cons">
								Receive	
							</button>
							<button class="btn btn-wallet-send btn-cons">
								Send
							</button>
						</div><br>
							<h3>
								<span class="semi-bold">
									{{ app_name() }} 
								</span><small>
									Wallet
								</small>
							</h3>
					</div>
					<div class="col-lg-6 col-sm-12">
						<div class="form-group-default form-group">
							<label>{{ app_name() }} Address</label>
							<br>
							<div  class="form-control text-muted">
								<a href="#" class="wallet-link">
									<!-- {{LogUser()->bitcoin_wallets->address}} -->
								</a>
								<img class="img-responsive  pull-right" style="width:5%;" src="{{LogUser()->bitcoin_wallets->qrcode}}" alt="">
							</div>
							

						</div>
					</div>
					<div class="col-lg-6">
						
					</div>
				</div>
			</div>

			<div class="tab-pane slide-left" id="usdwallet" aria-expanded="truetrue">
				<div class="row column-seperation">
					<div class="col-lg-12">
						<big class="pull-right p-l-2 balance">
							<!-- $ : {{ LogUser()->usd_account()->balance }} -->
						</big><br>
							<div class="">
								<img style="width: 100px" src="{{ icons('usd-c')}}" alt="" class="img-responsive ">
							</div>
						<br>

						<div class="">
							<button class="btn btn-wallet-receive btn-cons">
								Receive	
							</button>
							<button class="btn btn-wallet-send btn-cons">
								Send
							</button>
						</div><br>
							<h3>
								<span class="semi-bold">
									{{ app_name() }} 
								</span><small>
									USD Wallet
								</small>
							</h3>
					</div>
					<div class="col-lg-6 col-sm-12">
						<div class="form-group-default form-group">
							<label>USD Number</label>
							<br>
							<div  class="form-control text-muted">
								<a href="#" class="wallet-link">
									<!-- {{LogUser()->usd_account()->account_address}} -->
								</a>
								<img class="img-responsive  pull-right" style="width:5%;" src="{{LogUser()->bitcoin_wallets->qrcode}}" alt="">
							</div>
							

						</div>
					</div>
					<div class="col-lg-6">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection