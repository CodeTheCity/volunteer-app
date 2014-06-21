@extends('layouts.default')

@section('content')

<h1>Show Opportunity</h1>

<p>{{ link_to_route('opportunities.index', 'Return to All opportunities', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Opportunity_title</th>
				<th>Opportunity_detail</th>
				<th>Opportunity_travel_information</th>
				<th>Opportunity_date</th>
				<th>Location_id</th>
				<th>User_id</th>

		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $opportunity->opportunity_title }}}</td>
					<td>{{{ $opportunity->opportunity_detail }}}</td>
					<td>{{{ $opportunity->opportunity_travel_information }}}</td>
					<td>{{{ $opportunity->opportunity_date }}}</td>
					<td>{{{ $opportunity->location_id }}}</td>
					<td>{{{ $opportunity->user_id }}}</td>
				
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('opportunities.destroy', $opportunity->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('opportunities.edit', 'Edit', array($opportunity->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop