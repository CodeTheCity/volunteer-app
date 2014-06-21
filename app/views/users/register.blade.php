@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Register
@stop

{{-- Content --}}
@section('content')
<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Register New Account</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" action="{{ URL::to('users/register') }}" method="post">
                        {{ Form::token(); }}
                    <fieldset>
                        <div class="control-group {{ ($errors->has('email')) ? 'error' : '' }}" for="email">
                            <label class="control-label" for="email">E-mail</label>
                            <div class="controls form-group">
                                <input name="email" id="email" value="{{ Request::old('email') }}" type="text" class="form-control" placeholder="E-mail">
                                {{ ($errors->has('email') ? $errors->first('email') : '') }}
                            </div>
                        </div> 
                        <div class="control-group {{ $errors->has('mobilenumber') ? 'error' : '' }}" for="mobilenumber">
                            <label class="control-label" for="password">Mobile Number</label>
                            <div class="controls form-group">
                                <input name="mobilenumber" value="" type="text" class="form-control" placeholder="Mobile Number">
                                {{ ($errors->has('mobilenumber') ?  $errors->first('mobilenumber') : '') }}
                            </div>
                        </div>
                        <div class="control-group {{ $errors->has('city') ? 'error' : '' }}" for="city">
                            <label class="control-label" for="password">City</label>
                            <div class="controls form-group">
                                {{ Form::select('city', $cities,  Input::old('city'), array('class'=>'form-control', 'placeholder'=>'City')) }} 
                                {{ ($errors->has('city') ?  $errors->first('city') : '') }}
                            </div>
                        </div> 
                        
                        <div class="control-group {{ $errors->has('password') ? 'error' : '' }}" for="password">
                            <label class="control-label" for="password">Password</label>
                            <div class="controls form-group">
                                <input name="password" value="" type="password" class="form-control" placeholder="New Password">
                                {{ ($errors->has('password') ?  $errors->first('password') : '') }}
                            </div>
                        </div>
                        <div class="control-group {{ $errors->has('password_confirmation') ? 'error' : '' }}" for="password_confirmation">
                            <label class="control-label" for="password_confirmation">Confirm Password</label>
                            <div class="controls form-group">
                                <input name="password_confirmation" value="" type="password" class="form-control" placeholder="New Password Again">
                                {{ ($errors->has('password_confirmation') ? $errors->first('password_confirmation') : '') }}
                            </div>
                        </div>
                        <div class="form-actions">
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Register">                                
                        </div>                     
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@stop