@extends('layouts.scaffold')

@section('main')

<h1>Show Community_event</h1>

<p>{{ link_to_route('community_events.index', 'Return to All community_events', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Community_event_title</th>
				<th>Community_event_detail</th>
				<th>Community_event_date</th>
				<th>Location_id</th>
				<th>User_id</th>
				<th>
User_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $community_event->community_event_title }}}</td>
					<td>{{{ $community_event->community_event_detail }}}</td>
					<td>{{{ $community_event->community_event_date }}}</td>
					<td>{{{ $community_event->location_id }}}</td>
					<td>{{{ $community_event->user_id }}}</td>
					<td>{{{ $community_event->
user_id }}}</td>
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