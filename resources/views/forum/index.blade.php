@extends('app')
@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>Navbar example
                <a class="btn btn-lg btn-danger pull-right" href="{{ url('discussion/create') }}" role="button">create post »</a>
            </h1>
        </div>

    </div>
    <div class="container">
          <div class="row">
            <div class="col-md-9" role="main">
                @foreach($discussions as $discussion)
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                              <img class="media-object img-circle" alt="64x64" src="{{ $discussion->user->avatar }}" style="width: 64px; height: 64px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="/discussion/{{ $discussion->id }}">{{ $discussion->title }}</a></h4>
                            {{ $discussion->user->name }}
                            <div class="media-conversation-meta">
                                <span class="media-conversation-replies">
                                    <a href="/discussion/154#reply">{{ count($discussion->comments) }}</a>
                                    Replies
                                </span>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>        
          </div>        
    </div>
@stop