@extends('pages.admin.home')

@section('additional_partial_css')
	
	<link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/jstree/dist/themes/default/style.min.css')}}"/>

@endsection

@section('admin_content')
	<div class="row">
		<div class="col-md-12">
			<h1 style="color:#348EFE;">Tree View Genealogy</h1>
		</div>
		<div class="col-md-12">
			<div class="portlet blue box">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-cogs"></i>Tree View Genealogy
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
					<div id="tree_4" class="tree-demo">
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('additional_partial_plugins')
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="{{asset('assets/global/plugins/jstree/dist/jstree.min.js')}}"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
@endsection
@section('additional_partial_scripts')
	<script src="{{asset('assets/admin/pages/scripts/ui-tree.js')}}"></script>
	<script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           UITree.init();
        });

    </script>
@endsection
