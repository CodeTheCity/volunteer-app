@extends('layouts.default')

@section('content')

<h1>Show Location</h1>

<p>{{ link_to_route('locations.index', 'Return to All locations', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Location_name</th>
				<th>City_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $location->location_name }}}</td>
					<td>{{{ $location->city_id }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('locations.destroy', $location->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('locations.edit', 'Edit', array($location->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
