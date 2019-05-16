@extends('pages.admin.home')

@section('additional_partial_css')

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/select2/select2.css' )}}"/>

@endsection

@section('admin_content')
	<div class="row">
		
		<div class="col-md-12">
			<h1 style="color:#348EFE;">Admin Configuration</h1>
		</div>
		<div class="col-md-12">
			<div class="portlet box blue" id="form_wizard_1">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i> Admin Configuration
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

				<div class="portlet-body form">
					<form action="{{ url('/admin/configurable/configuration') }}" class="form-horizontal" id="submit_form" method="POST"> 
					 {{ csrf_field() }}
						<div class="form-wizard">
							<div class="form-body">
								<ul class="nav nav-pills nav-justified steps">
									<li>
										<a href="#tab1" data-toggle="tab" class="step">
										<span class="number">
										1 </span>
										<span class="desc">
										<i class="fa fa-check"></i> Level Setting </span>
										</a>
									</li>
									<li>
										<a href="#tab2" data-toggle="tab" class="step">
										<span class="number">
										2 </span>
										<span class="desc">
										<i class="fa fa-check"></i> Percentage Setting </span>
										</a>
									</li>
									<li>
										<a href="#tab3" data-toggle="tab" class="step active">
										<span class="number">
										3 </span>
										<span class="desc">
										<i class="fa fa-check"></i> Account Setting </span>
										</a>
									</li>
									<li>
										<a href="#tab4" data-toggle="tab" class="step">
										<span class="number">
										4 </span>
										<span class="desc">
										<i class="fa fa-check"></i> Confirm </span>
										</a>
									</li>
								</ul>
								<div id="bar" class="progress progress-striped" role="progressbar">
									<div class="progress-bar progress-bar-success">
									</div>
								</div>
								<div class="tab-content">
									<div class="alert alert-danger display-none">
										<button class="close" data-dismiss="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="alert alert-success display-none">
										<button class="close" data-dismiss="alert"></button>
										Your form validation is successful!
									</div>
									<div class="tab-pane active" id="tab1">
										<h3 class="block">Level Setting</h3>
										<div class="form-group">
											<label class="control-label col-md-3">Depth <span class="required">
											* </span>
											</label>
											<div class="col-md-4">
												<input type="number" class="form-control" id="depth" name="depth"/>
												<span class="help-block">
												Provide your system depth </span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Width <span class="required">
											* </span>
											</label>
											<div class="col-md-4">
												<input type="number" class="form-control" name="width"/>
												<span class="help-block">
												Provide your system width </span>
											</div>
										</div>														
									</div>
									<div class="tab-pane" id="tab2">
										<h3 class="block">Percentage Setting</h3>
										<div class="form-group">
											<label class="control-label col-md-3">Percentage for level <span class="required">
											* </span>
											</label>
											<div class="col-md-4" id="percent_for_depth">

											</div>
										</div>																					
									</div>
									<div class="tab-pane" id="tab3">
										<h3 class="block">Account Setting</h3>
										<div class="form-group">
											<label class="control-label col-md-3">Paypal account <span class="required">
											* </span>
											</label>
											<div class="col-md-4">
												<input type="text" class="form-control" name="paypal_account"/>
												<span class="help-block">
												</span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Membership Fee <span class="required">
											* </span>
											</label>
											<div class="col-md-4">
												<input type="number" class="form-control" name="budget"/>
												<span class="help-block">
												</span>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab4">
										<h3 class="block">Confirm your setting</h3>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<div class="row">
									<div class="col-md-offset-3 col-md-9">
										<a href="javascript:;" class="btn default button-previous">
										<i class="m-icon-swapleft"></i> Back </a>
										<a href="javascript:;" class="btn blue button-next">
										Continue <i class="m-icon-swapright m-icon-white"></i>
										</a>
										<button type="submit"   class="btn green button-submit" >Submit
										 <i class="m-icon-swapright m-icon-white"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('additional_partial_plugins')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="{{ asset('assets/global/plugins/select2/select2.min.js') }}"></script>
	<!-- END PAGE LEVEL PLUGINS -->
@endsection
@section('additional_partial_scripts')
	<script src="{{ asset('assets/admin/pages/scripts/form-wizard1.js') }}"></script>

	<script>
		jQuery(document).ready(function() {  

		   FormWizard.init();


		});
	</script>
@endsection
