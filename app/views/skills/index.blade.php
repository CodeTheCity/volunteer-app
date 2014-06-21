@extends('layouts.default')

@section('content')

<h1>All Skills</h1>

<p>{{ link_to_route('skills.create', 'Add New Skill', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($skills->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Skill</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($skills as $skill)
				<tr>
					<td><a href="/skills/{{{ $skill->id }}}">{{{ $skill->skill_name }}}</a></td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('skills.destroy', $skill->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('skills.edit', 'Edit', array($skill->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no skills
@endif

@stop
