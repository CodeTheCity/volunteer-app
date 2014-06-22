@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Volunteer
@stop

{{-- Content --}}
@section('content')

    <div class="row centered">
        <div class="col-lg-8 col-lg-offset-2 w">
            <h1>Volunteer App</h1>
        </div>
    </div>   
    
	@if (Sentry::check() && Sentry::getUser()->hasAccess('users'))
     <div class="row">
        <div class="col-lg-6">
            <h3>My Profile</h3>
            <hr>
            <h3>My Skills</h3>
            @foreach($skills as $skill)
                @if(isset($assigned))
                 <label class="checkbox">
                    {{ Form::checkbox(
                        'skills[]', 
                        $skill->id, 
                        in_array($skill->id, $assigned), ['disabled' => 'disabled']) 
                    }}{{ $skill->skill_name }}</label>
                @else
                 <label class="checkbox">
                    {{ Form::checkbox(
                        'skills[]', 
                        $skill->id, ['disabled' => 'disabled']) 
                    }}{{ $skill->skill_name }}</label>
                @endif
            @endforeach

            <h3>Locations I am available for:</h3>
            @foreach($locations as $location)
                @if(isset($location_assigned))
                 <label class="checkbox">
                    {{ Form::checkbox(
                        'locations[]', 
                        $location->id, 
                        in_array($location->id, $location_assigned), ['disabled' => 'disabled']) 
                    }}{{ $location->location_name }}</label>
                @else
                 <label class="checkbox">
                    {{ Form::checkbox(
                        'locations[]', 
                        $location->id,['disabled' => 'disabled']) 
                    }}{{ $location->location_name }}</label>
                @endif
            @endforeach
            <a href="/users/edit/{{{ Sentry::getUser()->id }}}" class="btn btn-md btn-primary">Edit Profile</a>
 
        </div>
        <div class="col-lg-6">
            <h3>Volunteer Matches</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Start Date</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skillmatches as $skillmatch)

                        @foreach ($skillmatch->users as $user)

                            @if ($user->id  == Sentry::getUser()->id)
                                @foreach ($skillmatch->opportunities as $opportunity)
                                    <tr>
                                        <td><a href="/opportunities/{{{ $opportunity->id }}}">{{{ $opportunity->opportunity_title }}}</a></td>
                                        <td>{{{ $opportunity->location->location_name }}}</td>
                                        <td>{{{ $opportunity->opportunity_date}}}</td>
                                        <td><a href="/opportunities/{{{ $opportunity->id }}}" class="btn btn-sm btn-default">Apply</a></td>
                                    </tr>
                                @endforeach
                            @endif      

                        @endforeach

                    @endforeach
              </tbody>
            </table>

           


        </div>

        
    </div>         

    @endif  
@stop