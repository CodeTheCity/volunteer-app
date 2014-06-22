@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Community Event</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'community_events.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('community_event_title', 'Title:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('community_event_title', Input::old('community_event_title'), array('class'=>'form-control', 'placeholder'=>'Title')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('community_event_detail', 'Details:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('community_event_detail', Input::old('community_event_detail'), array('class'=>'form-control', 'placeholder'=>'Details')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('community_event_date', 'Date:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::text('community_event_date', Input::old('community_event_date'), array('class'=>'date-picker form-control', 'placeholder'=>'Date')) }}
              
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('location_id', 'Location:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::select('location_id', $locations, Input::old('location_id'), array('class'=>'form-control')) }}
            </div>
        </div>
    
    {{ Form::hidden('user_id', $user->id) }}


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


