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
        @if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
        <h1>Volunteer App - Logged in as Admin</h1>
        @else    
        <h1>Volunteer App</h1>
        @endif
            
        </div>
    </div>   
    
	
     <div class="row">
        <div class="col-lg-6">
            @if (Sentry::check() && Sentry::getUser()->hasAccess('users'))
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

            @endif 

            @if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
            <h3>Admin Tools</h3>
            <hr>
            <p><a href="/opportunities/create" class="btn btn-md btn-primary">Add Volunteering Opportunity</a></p>
            <p><a href="/skills/create" class="btn btn-md btn-primary">Add Skill</a></p>
            <p><a href="/locations/create" class="btn btn-md btn-primary">Add Location</a></p>
            <p><a href="/community_events/create" class="btn btn-md btn-primary">Add Community Event</a></p>
            <h3>JSON Endpoints</h3>
            <hr>
            <p><a href="/v1/community-events" class="btn btn-md btn-default">Community Events</a></p>
            <p><a href="/v1/opportunity-matches" class="btn btn-md btn-default">Opportunity Matches</a></p>
            <p><a href="/v1/skill-matches" class="btn btn-md btn-default">Skill Matches</a></p>
            <p><a href="/v1/opportunities" class="btn btn-md btn-default">Opportunities</a></p>
            <p><a href="/v1/skills" class="btn btn-md btn-default">Skills</a></p>

            @endif 
 
        </div> 
        <div class="col-lg-6">
            @if (Sentry::check() && Sentry::getUser()->hasAccess('users'))
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
            @endif 
            @if (Sentry::check())
            <h3>Latest Community Events</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{{ $event->community_event_title }}}</td>
                            <td>{{{ $event->community_event_date }}}</td>
                            <td>{{{ $event->location->location_name }}}</td>
                        </tr>
                    @endforeach
              </tbody>
            </table>
            @endif

           


        </div>

        
    </div>         
@stop