@extends('layouts.default')

@section('content')

<h1>Show Community Event</h1>

<p>{{ link_to_route('community_events.index', 'Return to All Community Events', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Details</th>
			<th>Date</th>
			<th>Location</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $community_event->community_event_title }}}</td>
					<td>{{{ $community_event->community_event_detail }}}</td>
					<td>{{{ $community_event->community_event_date }}}</td>
					<td>{{{ $community_event->location->location_name }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('community_events.destroy', $community_event->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('community_events.edit', 'Edit', array($community_event->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
