@extends('layouts.app')

@section('content')
    
<div class="row mt-5 mb-5"> 
    <div class="col-md-4"><h2>Hi {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</h2></div>
    <div class="col-md-8 text-right float-md-right">Showing {{ count($entries)}} entries</div>
</div>

@if($entries)
<div class="card-columns">
@foreach($entries as $key=>$entry)
  <div class="card mb-4">
    @if(!empty($entry->image)) <a href="{{ $entry->link }}" target="_blank"><img class="card-img-top" src="{{ $entry->image }}" alt="{{ $entry->title}}" title="{{ $entry->title}}"></a>@endif
    <div class="card-body">
    <a href="{{ $entry->link }}" target="_blank"><h5 class="card-title">{{ $entry->title}}</h5></a>
      <p class="card-text">{{ $entry->description}}</p>
      <p class="card-text"><small class="text-muted"><a href="{{ route('dashboard.feed', [$entry->source_id, $entry->source_name]) }}">{{ $entry->source_name }}</a> |  Last updated {{ $entry->published_ago}}</small></p>
    </div>
  </div>
@endforeach  
</div> 
@else 
<div class="card box-shadow mb-3">
            <div class="card-body text-center">You have no feeds. <a href="{{ route('feeds')}}">Manage here</a>
            </div>
        </div>
@endif 
@endsection
