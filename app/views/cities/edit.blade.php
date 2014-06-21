@extends('layouts.default')

@section('content')

@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit City</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($city, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('cities.update', $city->id))) }}

        <div class="form-group">
            {{ Form::label('city_name', 'City Name:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('city_name', Input::old('city_name'), array('class'=>'form-control', 'placeholder'=>'Name')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('cities.show', 'Cancel', $city->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@endif

@stop