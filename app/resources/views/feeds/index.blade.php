@extends('layouts.app')

@section('content')


<div class="row mt-5 mb-5 justify-content-end">
    <div class="col-md-9 text-left">
        <h3 class="thin">My Feeds ({{count($feeds)}})</h3>
    </div>
    <div class="col-md-3">
        <a href="{{ route('feeds.add')}}" class="btn btn-lg float-md-right mr-0 pr-0">
        <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="vertical-align: bottom;">
                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg> ADD
        </a>
    </div>
</div>
  @if(Session::has('message'))
    <div class="mt-5 mb-5">
        <p class="alert alert-success col-md-12">{{ Session::get('message') }}</p>
    </div>
    @endif
@if(count($feeds) > 0)
    @foreach($feeds as $feed)
        <div class="card box-shadow mb-3">
            <div class="card-body">{{ $feed->title }}
                <a href="javascript:;" class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#deleteModal" onclick="deleteData({{$feed->id}})"><i ></i> Delete</a>
                <a href="{{ route('feeds.edit', $feed->id)}}" class="btn btn-secondary btn-sm float-right mr-1">Edit</a>
            </div>
        </div>
    @endforeach
@else 
<div class="card box-shadow mb-3">
            <div class="card-body text-center">You have no feeds</div>
        </div>
@endif
@endsection


 <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModallabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="" id="deleteForm" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModallabel">DELETE CONFIRMATION</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <p>Are you sure you want to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="formSubmit()">Yes, Delete</button>
            </div>
        </form>
    </div>
  </div>
</div>

 <script type=text/javascript>
     function deleteData(id)
     {
         var id = id;
         var url = '{{ route("feeds.delete", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
  </script>
