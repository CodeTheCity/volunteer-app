@extends('layouts.default')

@section('content')
@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))

<h1>Show City</h1>

<p>{{ link_to_route('cities.index', 'Return to All cities', array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>City Name</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $city->city_name }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('cities.destroy', $city->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('cities.edit', 'Edit', array($city->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@endif

@stop