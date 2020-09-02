@extends('layouts.app')

@section('content')
    <div class="row mt-5 mb-5 justify-content-end">
        <div class="col-md-9 text-left">
            <h3 class="thin">Add Feed</h3>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <div class="card box-shadow mb-3">
        <div class="card-body bg-light">
            <form class="form" role="form" method="POST" action="{{ route('feeds.add.post') }} ">
                {!! csrf_field() !!}
                <div class="form-label-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="inputTitle" value="{{ old('title') }}"  placeholder="Title" autofocus>
                    <label for="inputTitle">Title</label>
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-label-group">
                    <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" id="inputUrl" value="{{ old('url') }}"  placeholder="Url" >
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
@endsection
