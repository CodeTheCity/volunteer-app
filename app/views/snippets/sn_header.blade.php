<header>	
	<nav class="navbar navbar-inverse" role="navigation">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    @if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
	    <a href="{{ URL::to('/') }}" class="navbar-brand">Admin</a>
	    @else    
	     <a href="{{ URL::to('/') }}" class="navbar-brand">Volunteer</a>
	    @endif
	  </div>
	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			
			@if (Sentry::check() && Sentry::getUser()->hasAccess('users'))
			<li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{ URL::to('/') }}">Home</a></li>
			@endif
			@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
				<li {{ (Request::is('skills*') ? 'class="active"' : '') }}><a href="{{ URL::to('/skills') }}">Skills</a></li>
				<li {{ (Request::is('opportunities*') ? 'class="active"' : '') }}><a href="{{ URL::to('/opportunities') }}">Opportunities</a></li>
				<li {{ (Request::is('locations*') ? 'class="active"' : '') }}><a href="{{ URL::to('/locations') }}">Locations</a></li>
				<li {{ (Request::is('community_events*') ? 'class="active"' : '') }}><a href="{{ URL::to('/community_events') }}">Events</a></li>
			@endif 
		</ul>
		<ul class="nav pull-right navbar-nav">
			@if (Sentry::check())						
			<li class="divider-vertical"></li>
			<li {{ (Request::is('users/show/' . Sentry::getUser()->id) ? 'class="active"' : '') }}><a href="{{ URL::to('/users/show/'.Sentry::getUser()->id) }}">Account</a></li>
			<li><a href="{{ URL::to('users/logout') }}">Logout</a></li>
			@else
			<li {{ (Request::is('users/login') ? 'class="active"' : '') }}><a href="{{ URL::to('users/login') }}">Login</a></li>
			<li {{ (Request::is('users/register') ? 'class="active"' : '') }}><a href="{{ URL::to('users/register') }}">Register</a></li>
			@endif
		</ul>
	  </div><!-- /.navbar-collapse -->
	</nav>			<!-- ./ navbar -->
</header>	
	<div class="container">
		<div class="row">	