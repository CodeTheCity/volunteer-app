@extends('layouts.default')

@section('content')

<h1>All Community Event</h1>

<p>{{ link_to_route('community_events.create', 'Add New Community Event', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($community_events->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Details</th>
				<th>Date</th>
				<th>Location</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($community_events as $community_event)
				<tr>
					<td><a href="/community_events/{{{ $community_event->id }}}">{{{ $community_event->community_event_title }}}</a></td>
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
			@endforeach
		</tbody>
	</table>
@else
	There are no Community Events
@endif

@stop
