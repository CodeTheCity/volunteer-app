@extends('layouts.default')

@section('content')

<h1>{{{ $skill->skill_name }}}</h1>

<p>{{ link_to_route('skills.index', 'Return to All skills', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Skill</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $skill->skill_name }}}</td>
            <td>
                {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('skills.destroy', $skill->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
                {{ link_to_route('skills.edit', 'Edit', array($skill->id), array('class' => 'btn btn-info')) }}
            </td>
		</tr>
	</tbody>
</table>

@stop
