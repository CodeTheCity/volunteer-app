@extends('layouts.default')

@section('content')

<h1>All Locations</h1>

<p>{{ link_to_route('locations.create', 'Add New Location', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($locations->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Location</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($locations as $location)
				<tr>
					<td><a href="/locations/{{{ $location->id }}}">{{{ $location->location_name }}}</a></td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('locations.destroy', $location->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('locations.edit', 'Edit', array($location->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no locations
@endif

@stop
