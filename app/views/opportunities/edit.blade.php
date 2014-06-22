@extends('layouts.default')

@section('content')

@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Volunteering Opportunity</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($opportunity, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('opportunities.update', $opportunity->id))) }}

        <div class="form-group">
            {{ Form::label('opportunity_title', 'Title:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('opportunity_title', Input::old('opportunity_title'), array('class'=>'form-control', 'placeholder'=>'Title')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('opportunity_detail', 'Detail:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('opportunity_detail', Input::old('opportunity_detail'), array('class'=>'form-control', 'placeholder'=>'Detail')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('opportunity_travel_information', 'Travel Information:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('opportunity_travel_information', Input::old('opportunity_travel_information'), array('class'=>'form-control', 'placeholder'=>'Travel Information')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('opportunity_date', 'Date:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
            {{ Form::text('opportunity_date', Input::old('opportunity_date'), array('class'=>'date-picker form-control', 'placeholder'=>'Date')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('location_id', 'Location:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::select('location_id', $locations, Input::old('location_id'), array('class'=>'form-control', 'placeholder'=>'Location')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('opp_skills', 'Skills Required:', array('class'=>'col-md-2 control-label')) }}
            <div class="controls col-sm-2">
            @foreach($skills as $skill)
            @if(isset($assigned))
             <label class="checkbox">
                {{ Form::checkbox(
                    'skills[]', 
                    $skill->id, 
                    in_array($skill->id, $assigned)) 
                }}{{ $skill->skill_name }}</label>
            @else
             <label class="checkbox">
                {{ Form::checkbox(
                    'skills[]', 
                    $skill->id) 
                }}{{ $skill->skill_name }}</label>
            @endif
            @endforeach
            </div>
        </div>
        {{ Form::hidden('user_id', $user->id) }}
   

<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('opportunities.show', 'Cancel', $opportunity->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}
 @endif
@stop