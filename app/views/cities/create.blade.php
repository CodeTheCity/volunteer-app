@extends('layouts.default')

@section('content')

@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Add City</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'cities.store', 'class' => 'form-horizontal', 'files'=> true)) }}

    <div class="form-group">
        {{ Form::label('city_name', 'City Name:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('city_name', Input::old('city_name'), array('class'=>'form-control', 'placeholder'=>'Name')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('image', 'Image:', array('class'=>'col-md-2 control-label')) }}
         <div class="col-sm-6">
             {{ Form::file('image') }}
         </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="col-sm-10">
          {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
        </div>
    </div>

{{ Form::close() }}

@endif

@stop