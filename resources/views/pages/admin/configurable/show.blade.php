@extends('pages.admin.home')

@section('additional_partial_css')
	
@endsection

@section('admin_content')
<?php 
use App\Model\Adminsetting;
$percentage=unserialize(Adminsetting::all()->last()->percent_value);

?>
	<div class="row">
		<div class="col-md-12">
			<h1 style="color:#348EFE;">Admin Configuration</h1>
		</div>
		<div class="col-md-12">
			<div class="portlet blue box">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-cogs"></i>Admin Configuration
					</div>
					<div class="tools">
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
					<div class="row">
						<div class="col-md-12">
							<h4 class="form-section">Level</h4>
							<div class="row">
								<div class="form-group">
								<label class="control-label col-md-2">Width:</label>
								<div class="col-md-4">
									<p class="form-control-static">
										{{Adminsetting::all()->last()->width}}
									</p>
								</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2">Depth:</label>
									<div class="col-md-4">
										<p class="form-control-static">
											{{Adminsetting::all()->last()->depth}}
										</p>
									</div>
								</div>
							</div>
							<h4 class="form-section">Percentage</h4>
							<div class="row">
								<div class="form-group">
								<label class="control-label col-md-3">percentage:</label>
									
										
									<div class="col-md-4">
									@for($i=0;$i<sizeof($percentage);$i++)

										
											<div class="row">
												<div class="col-md-4">
													<p class="form-control-static">
														
													{{$i+1}} : {{$percentage[$i]}}%
														
													</p>
													</div>
											</div>
										
									
									@endfor
									</div>
							</div>
							</div>
							<h4 class="form-section">Purchase Membership</h4>
							<div class="row">
								
								<div class="form-group">
									<label class="control-label col-md-2">Email:</label>
									<div class="col-md-4">
										<p class="form-control-static">
											{{Adminsetting::all()->last()->account_email}}
										</p>
									</div>
								</div> 
								
								<div class="form-group">
									<label class="control-label col-md-2">Fee:</label>
									<div class="col-md-4">
										<p class="form-control-static">
											${{Adminsetting::all()->last()->membership_budget}}
										</p>
									</div>
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
@endsection
@section('additional_partial_scripts')

@endsection
