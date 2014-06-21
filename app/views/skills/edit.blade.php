@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Skill</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($skill, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('skills.update', $skill->id))) }}

        <div class="form-group">
            {{ Form::label('skill_name', 'Skill:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('skill_name', Input::old('skill_name'), array('class'=>'form-control', 'placeholder'=>'Skill')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('skills.show', 'Cancel', $skill->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop