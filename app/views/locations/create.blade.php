@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Location</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'locations.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('location_name', 'Name:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('location_name', Input::old('location_name'), array('class'=>'form-control', 'placeholder'=>'Name')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('city_id', 'City:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::select('city_id',$cities) }}<br/>
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


