@extends('pages.member.home')

@section('additional_partial_css')
	
	<link href="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css"/>

	<link href="{{asset('assets/admin/pages/css/tasks.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('member_content')

	<h3 class="page-title">
	Dashboard <small>reports & statistics</small>
	</h3>
	<!-- END PAGE HEADER-->
	<!-- BEGIN DASHBOARD STATS -->
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat blue-madison">
				<div class="visual">
					<i class="fa fa-comments"></i>
				</div>
				<div class="details">
					<div class="number">
						 1349
					</div>
					<div class="desc">
						 New Feedbacks
					</div>
				</div>
				<a class="more" href="javascript:;">
				View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat red-intense">
				<div class="visual">
					<i class="fa fa-bar-chart-o"></i>
				</div>
				<div class="details">
					<div class="number">
						 12,5M$
					</div>
					<div class="desc">
						 Total Profit
					</div>
				</div>
				<a class="more" href="javascript:;">
				View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat green-haze">
				<div class="visual">
					<i class="fa fa-shopping-cart"></i>
				</div>
				<div class="details">
					<div class="number">
						 549
					</div>
					<div class="desc">
						 New Orders
					</div>
				</div>
				<a class="more" href="javascript:;">
				View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="dashboard-stat purple-plum">
				<div class="visual">
					<i class="fa fa-globe"></i>
				</div>
				<div class="details">
					<div class="number">
						 +89%
					</div>
					<div class="desc">
						 Brand Popularity
					</div>
				</div>
				<a class="more" href="javascript:;">
				View more <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
	</div>
	<!-- END DASHBOARD STATS -->
	<div class="clearfix">
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-6">
			<!-- BEGIN PORTLET-->
			<div class="portlet light ">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-share font-red-sunglo hide"></i>
						<span class="caption-subject font-red-sunglo bold uppercase">Revenue</span>
						<span class="caption-helper">monthly stats...</span>
					</div>
					<div class="actions">
						<div class="btn-group">
							<a href="" class="btn grey-salsa btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							Filter Range<span class="fa fa-angle-down">
							</span>
							</a>
							<ul class="dropdown-menu pull-right">
								<li>
									<a href="javascript:;">
									Q1 2014 <span class="label label-sm label-default">
									past </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									Q2 2014 <span class="label label-sm label-default">
									past </span>
									</a>
								</li>
								<li class="active">
									<a href="javascript:;">
									Q3 2014 <span class="label label-sm label-success">
									current </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									Q4 2014 <span class="label label-sm label-warning">
									upcoming </span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="portlet-body">
					<div id="site_activities_loading">
						<img src="{{asset('assets/admin/layout/img/loading.gif')}}" alt="loading"/>
					</div>
					<div id="site_activities_content" class="display-none">
						<div id="site_activities" style="height: 228px;">
						</div>
					</div>
					<div style="margin: 20px 0 10px 30px">
						<div class="row">
							<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
								<span class="label label-sm label-success">
								Revenue: </span>
								<h3>$13,234</h3>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
								<span class="label label-sm label-info">
								Tax: </span>
								<h3>$134,900</h3>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
								<span class="label label-sm label-danger">
								Shipment: </span>
								<h3>$1,134</h3>
							</div>
							<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
								<span class="label label-sm label-warning">
								Orders: </span>
								<h3>235090</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END PORTLET-->
		</div>
		<div class="col-md-6">
			<!-- BEGIN CHART PORTLET-->
			<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-bar-chart font-green-haze"></i>
						<span class="caption-subject bold uppercase font-green-haze"> Simple Pie Chart</span>
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
						<a href="#portlet-config" data-toggle="modal" class="config">
						</a>
						<a href="javascript:;" class="reload">
						</a>
						<a href="javascript:;" class="fullscreen">
						</a>
						<a href="javascript:;" class="remove">
						</a>
					</div>
				</div>
				<div class="portlet-body">
					<div id="chart_6" class="chart" style="height: 525px;">
					</div>
				</div>
			</div>
			<!-- END CHART PORTLET-->
		</div>
	</div>
	<div class="clearfix">
	</div>

	<div class="row">
		<div class="col-md-6 col-sm-6">
			<div class="portlet light ">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-cursor font-purple-intense hide"></i>
						<span class="caption-subject font-purple-intense bold uppercase">General Stats</span>
					</div>
					<div class="actions">
						<a href="javascript:;" class="btn btn-sm btn-circle btn-default easy-pie-chart-reload">
						<i class="fa fa-repeat"></i> Reload </a>
					</div>
				</div>
				<div class="portlet-body">
					<div class="row">
						<div class="col-md-4">
							<div class="easy-pie-chart">
								<div class="number transactions" data-percent="55">
									<span>
									+55 </span>
									%
								</div>
								<a class="title" href="javascript:;">
								Transactions <i class="icon-arrow-right"></i>
								</a>
							</div>
						</div>
						<div class="margin-bottom-10 visible-sm">
						</div>
						<div class="col-md-4">
							<div class="easy-pie-chart">
								<div class="number visits" data-percent="85">
									<span>
									+85 </span>
									%
								</div>
								<a class="title" href="javascript:;">
								New Visits <i class="icon-arrow-right"></i>
								</a>
							</div>
						</div>
						<div class="margin-bottom-10 visible-sm">
						</div>
						<div class="col-md-4">
							<div class="easy-pie-chart">
								<div class="number bounce" data-percent="46">
									<span>
									-46 </span>
									%
								</div>
								<a class="title" href="javascript:;">
								Bounce <i class="icon-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6">
			<div class="portlet light ">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-equalizer font-purple-plum hide"></i>
						<span class="caption-subject font-red-sunglo bold uppercase">Server Stats</span>
						<span class="caption-helper">monthly stats...</span>
					</div>
					<div class="tools">
						<a href="" class="collapse">
						</a>
						<a href="#portlet-config" data-toggle="modal" class="config">
						</a>
						<a href="" class="reload">
						</a>
						<a href="" class="remove">
						</a>
					</div>
				</div>
				<div class="portlet-body">
					<div class="row">
						<div class="col-md-4">
							<div class="sparkline-chart">
								<div class="number" id="sparkline_bar"></div>
								<a class="title" href="javascript:;">
								Network <i class="icon-arrow-right"></i>
								</a>
							</div>
						</div>
						<div class="margin-bottom-10 visible-sm">
						</div>
						<div class="col-md-4">
							<div class="sparkline-chart">
								<div class="number" id="sparkline_bar2"></div>
								<a class="title" href="javascript:;">
								CPU Load <i class="icon-arrow-right"></i>
								</a>
							</div>
						</div>
						<div class="margin-bottom-10 visible-sm">
						</div>
						<div class="col-md-4">
							<div class="sparkline-chart">
								<div class="number" id="sparkline_line"></div>
								<a class="title" href="javascript:;">
								Load Rate <i class="icon-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix">
	</div>

	<div class="row">
		<div class="col-md-6 col-sm-6">
			<!-- BEGIN PORTLET-->
			<div class="portlet light calendar ">
				<div class="portlet-title ">
					<div class="caption">
						<i class="icon-calendar font-green-sharp"></i>
						<span class="caption-subject font-green-sharp bold uppercase">Feeds</span>
					</div>
				</div>
				<div class="portlet-body">
					<div id="calendar">
					</div>
				</div>
			</div>
			<!-- END PORTLET-->
		</div>

	</div>

@endsection

@section('additional_partial_plugins')

	<script src="{{asset('assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/global/plugins/jquery.pulsate.min.js')}}" type="text/javascript"></script>
	<!-- <script src="{{asset('assets/global/plugins/bootstrap-daterangepicker/moment.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
 -->
	<script src="{{asset('assets/global/plugins/amcharts/amcharts/amcharts.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/global/plugins/amcharts/amcharts/serial.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/global/plugins/amcharts/amcharts/pie.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/global/plugins/amcharts/amcharts/radar.js')}}" type="text/javascript"></script>
	<!-- <script src="{{asset('assets/global/plugins/amcharts/amcharts/themes/light.js')}}" type="text/javascript"></script> -->
	<!-- <script src="{{asset('assets/global/plugins/amcharts/amcharts/themes/patterns.js')}}" type="text/javascript"></script> -->
	<!-- <script src="{{asset('assets/global/plugins/amcharts/amcharts/themes/chalk.js')}}" type="text/javascript"></script> -->
	<!-- <script src="{{asset('assets/global/plugins/amcharts/ammap/ammap.js')}}" type="text/javascript"></script> -->
	<!-- <script src="{{asset('assets/global/plugins/amcharts/ammap/maps/js/worldLow.js')}}" type="text/javascript"></script> -->
	<!-- <script src="{{asset('assets/global/plugins/amcharts/amstockcharts/amstock.js')}}" type="text/javascript"></script> -->

	<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
	<!-- <script src="{{asset('assets/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script> -->
	<script src="{{asset('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
@endsection
@section('additional_partial_scripts')
	<script src="{{asset('assets/admin/pages/scripts/tasks.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/admin/pages/scripts/charts-amcharts.js')}}"></script>
	
	<script>
	jQuery(document).ready(function() {     
	   // Index.initDashboardDaterange();

	   // Index.initCalendar(); // init index page's custom scripts
	   Index.initCharts(); // init index page's custom scripts

	   Index.initMiniCharts();
	   // Tasks.initDashboardWidget();
	   ChartsAmcharts.init();
	});
	</script>
@endsection
