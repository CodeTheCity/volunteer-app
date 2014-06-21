@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Skill</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'skills.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('skill_name', 'Skill:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('skill_name', Input::old('skill_name'), array('class'=>'form-control', 'placeholder'=>'Skill')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


