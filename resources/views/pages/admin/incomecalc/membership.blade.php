@extends('pages.admin.home')

@section('additional_partial_css')
	
@endsection

@section('admin_content')

<?php 
use App\Model\Income_membership;
use App\User;
$i=0;
?>
	<div class="row">
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-cogs"></i>Member Subscription Revenue
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
				<div class="table-scrollable">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>
									 No
								</th>
								<th>
									 Username
								</th>
								<th>
									 Income
								</th>
								<th>
									 Month
								</th>
								<th>
									 Status
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach(Income_membership::all() as $income_membership)
							<tr>
								<td>
									 {{$i++}}
								</td>
								<td>
									 {{User::where('id',$income_membership->user_id)->first()->username}}
								</td>
								<td>
									 ${{$income_membership->income}}
								</td>
								<td>
									 {{$income_membership->date}}
								</td>
								<td>
									@if($income_membership->status=="Approved")
									<span class="label label-sm label-info">
									{{$income_membership->status}} </span>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('additional_partial_plugins')
	
@endsection
@section('additional_partial_scripts')
	
@endsection
