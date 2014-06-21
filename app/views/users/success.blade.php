@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
StampOut
@stop

{{-- Content --}}
@section('content')

 <div class="row centered" >
            <div class="col-lg-8 col-lg-offset-2 w">
                <h1>StampOut.</h1>
            </div>
        </div>
	@if (Sentry::check() && Sentry::getUser()->hasAccess('users'))
     <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2 w">
               <p>You are currently logged in. Welcome to StampOut</p>
            </div>
        </div>
    @endif 
    @if (Sentry::check() && Sentry::getUser()->hasAccess('hosts'))
     <div class="row centered">
            <div class="col-lg-8 col-lg-offset-2 w">
               <p>New Host Created - Select Host from the menu to Create your first Event</p>
            </div>
        </div>
    @endif   
@stop