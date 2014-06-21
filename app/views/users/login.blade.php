@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Log In
@stop

{{-- Content --}}
@section('content')
<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please sign in</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" action="{{ URL::to('users/login') }}" method="post">
                        {{ Form::token(); }}
                    <fieldset>

                        <div class="control-group {{ ($errors->has('email')) ? 'error' : '' }}" for="email">
                            <label class="control-label" for="email">E-mail</label>
                            <div class="controls form-group">
                                <input name="email" id="email" value="{{ Request::old('email') }}" type="text" class="form-control" placeholder="E-mail">
                                {{ ($errors->has('email') ? $errors->first('email') : '') }}
                            </div>
                        </div>
                          <div class="control-group {{ $errors->has('password') ? 'error' : '' }}" for="password">
                            <label class="control-label" for="password">Password</label>
                            <div class="form-group controls">
                                <input name="password" value="" type="password" class="form-control" placeholder="Password">
                                {{ ($errors->has('password') ?  $errors->first('password') : '') }}
                            </div>
                        </div>

                        <div class="control-group" for"rememberme">
                            <div class=" form-groupcontrols">
                                <label class="checkbox inline">
                                    <input type="checkbox" name="rememberMe" value="1"> Remember Me
                                </label>
                            </div>
                        </div>
    
                    
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                                
                        <a href="{{ URL::to('users/resetpassword') }}" class="btn btn-default btn-block">Forgot Password?</a>
                        

                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop