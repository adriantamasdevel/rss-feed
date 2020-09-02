@extends('layouts.app')

@section('content')

<div class="signup">      
    <form class="form-signin" role="form" method="POST" action="{{ route('login') }} ">
    {!! csrf_field() !!}
        <div class="mb-4"> 
            <h2>Login</h2>
        </div>


        <div class="form-label-group">
            <input type="email" class="form-control" name="email" id="inputEmail" value="{{ old('email') }}" placeholder="Email address" required autofocus> 
            <label for="inputEmail">Email address</label>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif

        </div>
        <div class="form-label-group">
                <input type="password" class="form-control" name="password" id="inputPassword"  placeholder="Password" required>
                <label for="inputPassword">Password</label>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

        </div>
        @if ($errors->has('no_user_error'))
            <div class="form-group row">
                <div class="col-md-10 offset-md-2">
                <strong>{{ $errors->first('no_user_error') }}</strong>
                </div>
            </div>
        @endif
        <div class="form-group row">
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Login</button>
            </div>
            
        </div>

        <div class="form-group row text-center">
            <div class="col-sm-12 mt-5"><a class="btn btn-link" href="{{ route('register') }}">Not yet a member? Create an account</a>
            </div>
        </div>
    </form>
</div>
@endsection
