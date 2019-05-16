
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
							<a href="#">
							<i class="icon-user"></i>My Profile</a>
						</li>						
						<li>
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
				<li class="">
					<a href="{{url('member/dashboard')}}">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					</a>
				</li>
				<li class="">
					<a href="javascript:;">
					<i class="icon-diamond"></i>
					<span class="title">Income Report</span>
					</a>
				</li>

				<li class="{!! $route->getPrefix() == 'member/genealogy'? 'active': '' !!}">
					<a href="javascript:;">
						<i class="icon-layers"></i>
						<span class="title">Genealogy</span>
						<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li>							
							<a href="{{url('member/genealogy/matrix')}}">
							<span class="title">Matrix Tree</span>
							</a>
						</li>

						<li>							
							<a href="{{url('member/genealogy/treeview')}}">
							<span class="title">TreeView Genealogy</span>
							</a>
						</li>
					</ul>
				</li>

				<li class="start {!! $route->getPrefix() == 'member/register'? 'active': '' !!}">
					<a href="{{url('member/register/register_new')}}">
					<i class="icon-plus"></i>
					<span class="title">Register New</span>
					</a>
				</li>

				<li class="start {!! $route->getPrefix() == 'member/purchase'? 'active': '' !!}">
					<a href="{{url('member/purchase')}}">
					<i class="icon-basket"></i>
					<span class="title">Purchase Membership</span>
					</a>
				</li>

			</ul>
		</div>
	</div>
	
	<div class="page-content-wrapper">
		<div class="page-content">
			@yield('member_content')
		</div>
	</div>	
</div>


@endsection


@section('additional_level_plugins')
	@yield('additional_partial_plugins')
@endsection

@section('additional_level_scripts')
	@yield('additional_partial_scripts')
@endsection

