@extends('layouts.app')

@section('content')

<div class="signup">      
    <form class="form-signin" role="form" method="POST" action="{{ route('register') }} ">
    {!! csrf_field() !!}
        <div class="mb-4"> 
            <h2>Register new account</h2>
        </div>


        <div class="form-label-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <input type="name" class="form-control" name="name" id="inputName" value="{{ old('name') }}" placeholder="Name" required autofocus> 
            <label for="inputName">Name</label>
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif

        </div>

        <div class="form-label-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" class="form-control" name="email" id="inputEmail" value="{{ old('email') }}" placeholder="Email address" required autofocus> 
            <label for="inputEmail">Email address</label>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif

        </div>
        <div class="form-label-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password" id="inputPassword"  placeholder="Password" required autofocus>
                <label for="inputPassword">Password</label>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

        </div>

        <div class="form-label-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password_confirmation" id="inputPasswordConfirmation"  placeholder="Password confirmation" required autofocus>
                <label for="inputPasswordConfirmation">Password confirmation</label>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

        </div>

        @if ($errors->has('user_already_registered'))
            <div class="form-group row">
                <div class="col-md-10 offset-md-2">
                <strong>{{ $errors->first('user_already_registered') }}</strong>
                </div>
            </div>
        @endif
        <div class="form-group row">
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <div class="col-md-8 text-right">
                <a class="btn btn-link" href="{{ route('login') }}">Already a member?</a>
            </div>
            
        </div>

        
    </form>
</div>

   
@endsection
