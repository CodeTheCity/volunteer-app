@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Community Event</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($community_event, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('community_events.update', $community_event->id))) }}

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
                {{ Form::text('community_event_date', Input::old('community_event_date'), array('class'=>'date-picker form-control', 'placeholder'=>'Date')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('location_id', 'Location_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
               {{ Form::select('location_id', $locations, Input::old('location_id'), array('class'=>'form-control')) }}
            </div>
        </div>

 {{ Form::hidden('user_id', $user->id) }}


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('community_events.show', 'Cancel', $community_event->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop