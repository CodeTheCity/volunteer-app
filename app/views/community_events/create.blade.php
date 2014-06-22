@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Community_event</h1>

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
            {{ Form::label('community_event_title', 'Community_event_title:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('community_event_title', Input::old('community_event_title'), array('class'=>'form-control', 'placeholder'=>'Community_event_title')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('community_event_detail', 'Community_event_detail:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('community_event_detail', Input::old('community_event_detail'), array('class'=>'form-control', 'placeholder'=>'Community_event_detail')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('community_event_date', 'Community_event_date:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('community_event_date', Input::old('community_event_date'), array('class'=>'form-control', 'placeholder'=>'Community_event_date')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('location_id', 'Location_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('location_id', Input::old('location_id'), array('class'=>'form-control', 'placeholder'=>'Location_id')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('user_id', 'User_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'user_id', Input::old('user_id'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('
user_id', '
User_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('
user_id', Input::old('
user_id'), array('class'=>'form-control', 'placeholder'=>'
User_id')) }}
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


