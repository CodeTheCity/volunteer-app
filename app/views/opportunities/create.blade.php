@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Create Opportunity</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'opportunities.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('opportunity_title', 'Opportunity_title:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('opportunity_title', Input::old('opportunity_title'), array('class'=>'form-control', 'placeholder'=>'Opportunity_title')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('opportunity_detail', 'Opportunity_detail:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('opportunity_detail', Input::old('opportunity_detail'), array('class'=>'form-control', 'placeholder'=>'Opportunity_detail')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('opportunity_travel_information', 'Opportunity_travel_information:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('opportunity_travel_information', Input::old('opportunity_travel_information'), array('class'=>'form-control', 'placeholder'=>'Opportunity_travel_information')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('opportunity_date', 'Opportunity_date:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('opportunity_date', Input::old('opportunity_date'), array('class'=>'form-control', 'placeholder'=>'Opportunity_date')) }}
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
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


