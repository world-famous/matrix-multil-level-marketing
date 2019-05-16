
@extends('layouts.app')

@section('additional_css')
 @yield('additional_partial_css')
@endsection

@section('content')

<?php 
$route = Route::current();
?>
<!-- <div class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid"> -->
<!-- BEGIN HEADER -->

<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="/">
			<!-- <img src="{{asset('logos/logo.jpg')}}" alt="logo" class="logo-default"/> -->
			</a>
			<div class="menu-toggler sidebar-toggler hide">
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">

				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="{{asset('Icons/avatar-big.png')}}"/>
					<span class="username username-hide-on-mobile">{{Auth::user()->username}}</span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="extra_profile.html">
							<i class="icon-user"></i>My Profile</a>
						</li>
						
						<li>
							<!-- <a href="login.html"> -->
							<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i class="icon-key"></i>Log Out</a>
						</li>
					</ul>
				</li>

			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
	
		<div class="page-sidebar navbar-collapse collapse">
			
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>

				<li class="start {!! $route->getPrefix() == 'admin/register'? 'active': '' !!}">
					<a href="javascript:;">
					<i class="fa fa-plus"></i>
					<span class="title">Registration </span>
					<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li >
							<a href="{{url('admin/register/register_yahlife')}}">
							<span class="title">Yahlife portlet</span>
							</a>
						</li>
						<li>
							<a href="{{url('admin/register/register_new')}}">
							<span class="title">Admin registration</span>
							</a>
						</li>
					</ul>
				</li>

				<li class="{!! $route->getPrefix() == 'admin/configurable'? 'active': '' !!}">
					<a href="javascript:;">
					<i class="fa fa-tree"></i>
					<span class="title">Matrix Plan</span>
					<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{url('/admin/configurable')}}">
								<span class="title">Admin Configurable</span>
							</a>
						</li>
						<li>
							<a href="{{url('/admin/configurable/show')}}">
								<span class="title">Admin Configuration</span>
							</a>
						</li>
					</ul>
				</li>

				<li class="{!! $route->getPrefix() == 'admin/incomecalc'? 'active': '' !!}">
					<a href="javascript:;">
					<i class="icon-calculator"></i>
					<span class="title">Income Calculations</span>
					<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="{{url('admin/incomecalc/membership')}}">
							<span class="title">% of Net Downline Member Subscription Revenue</span>
							</a>
						</li>
						<li>
							<a href="javascript:;">
								<span class="title">% of Gross Downline Sales Commission</span>
								<span class="arrow"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="#">
									<span class="title">NOP Commerce affiliate sales</span>
									</a>
								</li>
								<li>
									<a href="#">
									<span class="title">NOP Direct sales on personal website</span>
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">							
								<span class="title">Payout qualifications</span>
								<span class="arrow"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="javascript:;">
										<span class="title">“x” hour of community service.</span>
										<span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="#">
												<span class="title">
												via Cyclos credits
												</span>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>

				<li >
					<a href="javascript:;">
					<i class="icon-credit-card"></i>
					<span class="title">Payouts</span>
					<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="javascript:;">
								<span class="title">Components</span>
								<span class="arrow"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="javascript:;">
										<span class="title">Payment Gateways</span>
										<span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="#"><span class="title">Cyclos</span></a>
										</li>
										<li>
											<a href="#"><span class="title">Paypal</span></a>
										</li>
									</ul>
								</li>
								<li>
									<!-- <i class="icon-wallet"></i> -->
									<a href="#"><span class="title">E-Wallet</span></a>
								</li>
							</ul>
						</li>
					</ul>
				</li>

				<li class="{!! $route->getPrefix() == 'admin/genealogy'? 'active': '' !!}">
					<a href="javascript:;">
						<i class="icon-layers"></i>
						<span class="title">Genealogy</span>
						<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li>							
							<a href="{{url('admin/genealogy/matrix')}}"><span class="title">Matrix Tree</span></a>
						</li>

						<li>							
							<a href="{{url('admin/genealogy/treeview')}}"><span class="title">TreeView Genealogy</span></a>
						</li>
					</ul>
				</li>

				<li >
					<a href="javascript:;">
					<i class="icon-diamond"></i>
					<span class="title">Bonusses</span>
					<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="javascript:;">
								<span class="title">Admin Defined</span>
								<span class="arrow"></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="#"><span class="title">Name of bonus category</span></a>
								</li>
								<li>
									<a href="#">
										<span class="title">Downline Revenue Qualification requirement</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title">Gross Platform Revenue Qualification requirement</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="title">Number of downline members to qualify</span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>

				<li >
					<a href="javascript:;">
					<i class="icon-notebook"></i>
					<span class="title">Reports</span>
					<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#"><span class="title">Member joining Analytics</span></a>
						</li>
						<li>
							
							<a href="#"><span class="title">Income vs Payout</span></a>
						</li>
						<li>
							
							<a href="#"><span class="title">Messages</span></a>
						</li>
						<li>
							
							<a href="#"><span class="title">Add accounts</span></a>
						</li>
						<li>
							
							<a href="#"><span class="title">Total Members</span></a>
						</li>
						<li>
							
							<a href="#"><span class="title">Total Members Income</span></a>
						</li>
						<li>
							
							<a href="#"><span class="title">New Registered Users</span></a>
						</li>
					</ul>
				</li>

				<li >
					<a href="javascript:;">
					<i class="icon-bubbles"></i>
					<span class="title">Communications</span>
					<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li>							
							<a href="#"><span class="title">Email</span></a>
						</li>
						<li>							
							<a href="#"><span class="title">Liferay Portlet Integration</span></a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	
	<div class="page-content-wrapper">
		<div class="page-content">
			@yield('admin_content')
		</div>
	</div>	
</div>
<div class="page-footer">
	<div class="page-footer-inner">
		 2017 &copy; MLM SOFTWARE <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">FERNANDO</a>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>

@endsection


@section('additional_level_plugins')
	@yield('additional_partial_plugins')
@endsection

@section('additional_level_scripts')
	@yield('additional_partial_scripts')
@endsection
