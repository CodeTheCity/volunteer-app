@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Show user
@stop

{{-- Content --}}
@section('content')

  @if (Sentry::check())

    
	<h4>Account Profile</h4>
	
  	<div class="well clearfix">
	    <div class="span7">
			@if ($user->city)
		    	<p><strong>City:</strong> {{ $user->city }} </p>
			@endif
	    	
		    @if ($user->first_name)
		    	<p><strong>First Name:</strong> {{ $user->first_name }} </p>
			@endif
			@if ($user->last_name)
		    	<p><strong>Last Name:</strong> {{ $user->last_name }} </p>
			@endif
		    <p><strong>Email:</strong> {{ $user->email }}</p>
		    <button class="btn btn-info" onClick="location.href='{{ URL::to('users/edit') }}/{{ $user->id}}'">Edit Profile</button>
		</div>
		<div class="span4">
			<p><em>Account created: {{ $user->created_at }}</em></p>
			<p><em>Last Updated: {{ $user->updated_at }}</em></p>
		</div>
	</div>

	<h4>My Skills:</h4>
	<div class="well">
	    @foreach($skills as $skill)
		    @if(isset($assigned))
			<p>{{ $skill->skill_name }}</p>
		    @else
		    <p>You haven't entered any skills in yet</p>
		    @endif
		@endforeach
	</div>

	<h4>Locations I am available for:</h4>
	<div class="well">
	   
	</div>


	<h4>Group Memberships:</h4>
	<div class="well">
	    <ul>
	    	@if (count($myGroups) >= 1)
		    	@foreach ($myGroups as $group)
					<li>{{ $group['name'] }}</li>
				@endforeach
			@else 
				<li>No Group Memberships.</li>
			@endif
	    </ul>
	</div>

  @endif


@stop
