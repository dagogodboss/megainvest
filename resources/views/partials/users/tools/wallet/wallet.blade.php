<div class="col-md-12">
	<div class="row content-justify-center">
		<div class="col-md-3 col-sm-12 col-xl-3">
			<div class="card card-default">
				<div class="card-block">
					<h4 class="text-title">
						Bitcoin Wallet
					</h4>
					<div class="">
						<span class="fs-1">
							{{ LogUser()->bitcoin_account()->account_address }}
						</span>
						<small class="pull-right">
							{{ LogUser()->bitcoin_account()->balance }} BTC
						</small>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-12 col-xl-3">
			<div class="card card-default">
				<div class="card-block">
					<h4 class="text-title">
						Dollar Account
					</h4>
					<div>
						<span class="fs-1">
							{{ LogUser()->usd_account()->account_address }}
						</span>
						<small class="pull-right">
							$ {{ LogUser()->usd_account()->balance }}

						</small>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-12 col-xl-3">
			<div class="card card-default">
				<div class="card-block">
					<h4 class="text-title">
						{{ app_name() }} Wallet
					</h4>
					<div>
						<span class="fs-1">
							hello Wallet Master
							{{-- LogUser()->crypto_account()->account_uuid --}}
						</span>
						<small class="pull-right">
							0.0 RC
							{{-- LogUser()->crypto_account()->balance --}}

						</small>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-12 col-xl-3">
			<div class="card card-default">
				<div class="card-block">
					<h4 class="text-title">
						Your Bitcoin Address
					</h4>
						<div>
						<span class="fs-1">
						{{ LogUser()->bitcoin_account()->account_address}}	
						</span>
							<small class="pull-right">1.0 BTC</small>
						</div>
				</div>
			</div>
		</div>

	</div>
</div>