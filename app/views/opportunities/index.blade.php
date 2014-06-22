@extends('layouts.default')

@section('content')

<h1>All Opportunities</h1>

<p>{{ link_to_route('opportunities.create', 'Add New Opportunity', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($opportunities->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Details</th>
				<th>Travel Information</th>
				<th>Date</th>
				<th>Location</th>	
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($opportunities as $opportunity)
				<tr>
					<td><a href="/opportunities/{{{ $opportunity->id }}}">{{{ $opportunity->opportunity_title }}}</a></td>
					<td>{{{ $opportunity->opportunity_detail }}}</td>
					<td>{{{ $opportunity->opportunity_travel_information }}}</td>
					<td>{{{ $opportunity->opportunity_date }}}</td>
					<td>{{{ $opportunity->location->location_name }}}</td>
			
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('opportunities.destroy', $opportunity->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('opportunities.edit', 'Edit', array($opportunity->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no opportunities
@endif

@stop
