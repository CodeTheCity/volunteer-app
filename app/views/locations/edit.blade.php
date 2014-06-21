@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Location</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($location, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('locations.update', $location->id))) }}

        <div class="form-group">
            {{ Form::label('location_name', 'Location_name:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('location_name', Input::old('location_name'), array('class'=>'form-control', 'placeholder'=>'Location_name')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('city_id', 'City_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('city_id', Input::old('city_id'), array('class'=>'form-control', 'placeholder'=>'City_id')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('locations.show', 'Cancel', $location->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop