@extends('pages.member.home')

@section('additional_partial_css')

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/select2/select2.css' )}}"/>

@endsection

@section('member_content')
<?php
	use App\Model\Adminsetting;
?>
	<div class="row">
		
		<div class="col-md-12">
			<h1 style="color:#348EFE;">Purchase Membership</h1>
		</div>
		<div class="col-md-12">
			<div class="portlet box blue" id="form_wizard_1">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>Purchase Membership
					</div>
					<div class="tools hidden-xs">
						<a href="javascript:;" class="collapse">
						</a>
						<a href="#portlet-config" data-toggle="modal" class="config">
						</a>
						<a href="javascript:;" class="reload">
						</a>
						<a href="javascript:;" class="remove">
						</a>
					</div>
				</div>

				<div class="portlet-body">
					<h1>Membership Fee is ${{Adminsetting::all()->last()->membership_budget}}</h1>
				    @if (session('status')=='success')
				        <div class="alert alert-success">
				            <ul>
				                <li>{{ session('message') }}</li>
				            </ul>
				        </div>
				    @elseif (session('status')=='cancel')
				   		<div class="alert alert-danger">
				            <ul>
				                <li>{{ session('message') }}</li>
				            </ul>
				        </div>
				    @endif
					<div class="row">
						<div class="col-md-3 col-sm-3 col-xs-3">
							<ul class="nav nav-tabs tabs-left">
								<li class="active">
									<a href="#tab_6_1" data-toggle="tab">
									EWallet </a>
								</li>
								<li>
									<a href="#tab_6_2" data-toggle="tab">
									Paypal </a>
								</li>
							</ul>
						</div>
						<div class="col-md-9 col-sm-9 col-xs-9">
							<div class="tab-content">
								<div class="tab-pane active" id="tab_6_1">
									<center>
										<form action="{{url('/member/purchase/ewallet')}}" method="post">
											{{ csrf_field() }}
										    <div class="text-center">
										    <h2>Confirm purchase </h2>
										    <p>
										    	@if (session('status')=='success')
						                        <button class="btn btn-success btn-lg" role="button" type="submit" disabled>Ewallet payment confirmation</button>
						                        @else
						                        <button class="btn btn-success btn-lg" role="button" type="submit">Ewallet payment confirmation</button>
						                        @endif
										    </p>
										    </div>
										</form>
									</center>
								</div>
								<div class="tab-pane fade row" id="tab_6_2">
									<center>
										<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" class="text-center">
					                        <input type="hidden" name="cmd" value="_cart">
					                        <input type="hidden" name="upload" value="1">
					                        <input type="hidden" name="business" value="{{Adminsetting::all()->last()->account_email}}">
					                        <input type="hidden" name="item_name_1" value="purchase membership">
					                        <input type="hidden" name="amount_1" value="{{Adminsetting::all()->last()->membership_budget}}">
					                        <input type="hidden" name="invoice" value="GC_{{Auth::user()->username}}_{{date('Y-m-d H:i:s')}}">
					                        <input type="hidden" name="return" value="{{url('/member/purchase',['status'=>'success'])}}">
					                        <input type="hidden" name="cbt" value="Click here to COOMPLETE ORDER">
					                        <input type="hidden" name="cancel_return" value="{{url('/member/purchase',['status'=>'cancel'])}}">
					                        <h2>Confirm purchase </h2> 
					                        @if (session('status')=='success')
					                        <input class="btn btn-success btn-lg" type="submit" value="Purchase Via PayPal" disabled>
					                        @else
					                        <input class="btn btn-success btn-lg" type="submit" value="Purchase Via PayPal">
					                        @endif
					                    </form>
				               		</center>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('additional_partial_plugins')

	<script src="{{asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js')}}" type="text/javascript"></script>

@endsection
@section('additional_partial_scripts')

@endsection
