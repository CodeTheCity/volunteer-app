@extends('layouts.default')

@section('content')

<h1>{{{ $opportunity->opportunity_title }}}</h1>

<p>{{ link_to_route('opportunities.index', 'Return to All opportunities', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Details</th>
			<th>Travel Information</th>
			<th>Date</th>
			<th>Location</th>

		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $opportunity->opportunity_title }}}</td>
			<td>{{{ $opportunity->opportunity_detail }}}</td>
			<td>{{{ $opportunity->opportunity_travel_information }}}</td>
			<td>{{{ $opportunity->opportunity_date }}}</td>
			<td>{{{ $opportunity->location->location_name }}}</td>
		
            <td>
            	@if (Sentry::check() && Sentry::getUser()->hasAccess('users'))
			    @else
			     {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('opportunities.destroy', $opportunity->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
                {{ link_to_route('opportunities.edit', 'Edit', array($opportunity->id), array('class' => 'btn btn-info')) }}
			    @endif
                
            </td>
		</tr>
	</tbody>
</table>

<h2>Skills Required</h2>
@foreach($skills as $skill)
@if(isset($assigned))
 <label class="checkbox">
    {{ Form::checkbox(
        'skills[]', 
        $skill->id, 
        in_array($skill->id, $assigned), ['disabled' => 'disabled']) 
    }}{{ $skill->skill_name }}</label>
@else
 <label class="checkbox">
    {{ Form::checkbox(
        'skills[]', 
        $skill->id) 
    }}{{ $skill->skill_name }}</label>
@endif
@endforeach



@stop