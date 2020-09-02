@extends('layouts.app')

@section('content')
<div class="row mt-5 mb-5 justify-content-end">
    <div class="col-md-9 text-left">
        <h3 class="thin">Edit Feed</h3>
    </div>
    <div class="col-md-3">
    </div>
</div>

@if(Session::has('message'))
<div class="mt-5 mb-5">
    <p class="alert alert-success">{{ Session::get('message') }}</p>
</div>   
@endif

@if($feed)
<div class="card box-shadow mb-3">
    <div class="card-body bg-light">
        <form class="form" role="form" method="POST" action="{{ route('feeds.edit.post', $feed->id) }} ">
            {!! csrf_field() !!}
            <div class="form-label-group">
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="inputTitle" value="{{ $feed->title }}"  placeholder="Title" required autofocus>
                <label for="inputTitle">Title</label>
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-label-group">
                <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" id="inputUrl" value="{{ $feed->url }}"  placeholder="Url" required>
                <label for="inputUrl">Source url</label>
                @if ($errors->has('url'))
                    <span class="help-block">
                        <strong>{{ $errors->first('url') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary float-right">Save</button>
            <a href="{{ route('feeds') }}" type="submit" class="btn btn-secondary float-right mr-2">Cancel</a>

        </form>
    </div>
</div>
@else 
<div class="card box-shadow mb-3">
    <div class="card-body">The feed you're trying to edit is not accesible.
        <a href="{{ route('feeds.add')}}" class="btn btn-danger btn-sm float-right">Add new</a>
    </div>
</div>
@endif
@endsection
